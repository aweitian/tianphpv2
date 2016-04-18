<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
class loadDataModel extends AppModel{
	private $callback = null;
	
	
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}

	public function setCallback($cb){
		$this->callback = $cb;
	}
	/**
	 * $_FILES["csv"]
	 * @param array $uf
	 * @return rirResult
	 */
	public function mvFIleToUploads($uf){
		$error = $uf["error"];
		$tmp_name = $uf["tmp_name"];
		//$name = time();
		$name = $uf["name"];
// 		print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// 		exit($name);
		$destination = FILE_SYSTEM_ENTRY."/uploads/".$name;
		$errInfo = array(
			"",
			"超过了文件大小，在php.ini文件中设置",
			"超过了文件的大小MAX_FILE_SIZE选项指定的值",
			"文件只有部分被上传",
			"没有文件被上传",
			"上传文件大小为0"
		);
		$error = $error % count($errInfo);
		if($error == 0){
// 			echo $tmp_name;
// 			echo "<br>";
// 			echo $destination;
			move_uploaded_file($tmp_name,$destination);
		}
		
		return new rirResult($error,$errInfo[$error],$destination);


	}
	
	/**
	 * 检查有没有这个频道，有返回ID，没有插入，返回ID
	 * @param string $chv
	 */
	public function getChananelId($chv){
		$data = $this->db->fetch("SELECT 
			`ch_id`,`ch_val`
		 FROM `data_channel` WHERE `ch_val` = :ch_val", array(
			"ch_val" => $chv,
		));
		if(empty($data)){
			return $this->db->insert("INSERT INTO `data_channel` (
				`ch_val`
			) VALUES (
				:ch_val
			)", array(
				"ch_val" => $chv,
			));
		}else{
			return $data["ch_id"];
		}
	}
	/**
	 * 检查有没有这个帐号，有返回ID，没有插入，返回ID
	 * @param int $ch
	 * @param string $acc
	 * @param pc/mobile $dev
	 * @return int account_id
	 */
	public function getAccountId($ch,$acc,$dev){
		$data = $this->db->fetch("SELECT 
			`ac_id`,`dev`,`ch_id`,`ac_val`
		 FROM `data_account` 
		 WHERE `ch_id` = :ch_id AND `ac_val` = :ac_val AND `dev` = :dev", array(
			"dev" => $dev,
			"ch_id" => $ch,
			"ac_val" => $acc,
		));
		if(empty($data)){
			return $this->db->insert("INSERT INTO `data_account` (
				`dev`,`ch_id`,`ac_val`
			) VALUES (
				:dev,:ch_id,:ac_val
			)", array(
				"dev" => $dev,
				"ch_id" => $ch,
				"ac_val" => $acc,
			));
		}else{
			return $data["ac_id"];
		}
	}
	/**
	 * 有返回ID，没有插入返回ID
	 * @param int $acid
	 * @param string $plv
	 * @return int plan id
	 */
	public function getPlanId($acid,$plv){
		$data = $this->db->fetch("SELECT 
			`pl_id`,`ac_id`,`pl_val`
		 FROM `data_plan` 
				WHERE `ac_id` = :ac_id AND `pl_val` = :pl_val", array(
			"ac_id" => $acid,
			"pl_val" => $plv,
		));
		if(empty($data)){
			return $this->db->insert("INSERT INTO `data_plan` (
				`ac_id`,`pl_val`
			) VALUES (
				:ac_id,:pl_val
			)", array(
				"ac_id" => $acid,
				"pl_val" => $plv,
			));
		}else{
			return $data["pl_id"];
		}
	}
	/**
	 * 有返回ID，没有插入返回ID
	 * @param int $plid
	 * @param string $uv
	 * @return int unit id
	 */
	public function getUnitId($plid,$uv){
		$data = $this->db->fetch("SELECT 
			`un_id`,`pl_id`,`un_val`
		 FROM `data_unit` WHERE `pl_id` = :pl_id AND `un_val` = :un_val", array(
				"pl_id" => $plid,
				"un_val" => $uv,
		));
		if(empty($data)){
			return $this->db->insert("INSERT INTO `data_unit` (
				`pl_id`,`un_val`
			) VALUES (
				:pl_id,:un_val
			)", array(
				"pl_id" => $plid,
				"un_val" => $uv,
			));
		}else{
			return $data["pl_id"];
		}
	}
	
	/**
	 * 有返回ID，没有插入返回ID
	 * @param int $unid
	 * @param string $title
	 * @param string $desc1
	 * @param string $desc2
	 * @param string $url
	 * @return int 
	 */
	public function getIdeaId($unid,$title,$desc1,$desc2,$url){
		$data = $this->db->fetch("SELECT 
			`id_id`,`un_id`,`title`,`desc1`,`desc2`,`url`
 		FROM `data_idea` 
		WHERE `un_id` = :un_id 
		  AND `title` = :title
		  AND `desc1` = :desc1
		  AND `desc2` = :desc2
				", array(
			"un_id" => $unid,
			"title" => $title,
			"desc1" => $desc1,
			"desc2" => $desc2,
		));
		if(empty($data)){
			return $this->db->insert("INSERT INTO `data_idea` (
				`un_id`,`title`,`desc1`,`desc2`,`url`
			) VALUES (
				:un_id,:title,:desc1,:desc2,:url
			)", array(
				"un_id" => $unid,
				"title" => $title,
				"desc1" => $desc1,
				"desc2" => $desc2,
				"url"   => $url
			));
		}else{
			return $data["id_id"];
		}
	}
	
	public function getUploadInfo($token){
		return $this->db->fetch("SELECT * FROM `log_upload_token` WHERE `token` = :token", array(
				":token" => $token,
		));
	}
	
	public function loadData($metaData){
		$this->loadDataToDb($metaData["name"],$metaData["dev"],$metaData["ch"]);

	}
	
	public function loadDataToDb($path,$dev,$chananel){
// 		$i = 15;
// 		while($i--){
// 			sleep(1);
// 			if(!is_null($this->callback)){
// 				call_user_func_array($this->callback, array(16-$i,$i));
// 			}
// 		}
		
		
// 		return ;
		
		
		
		ini_set("max_execution_time", 300);
		#offsets
		$offset_acc  = 2;
		$offset_plan = 3;
		$offset_unit = 4;
		$offset_titl = 5;
		$offset_des1 = 6;
		$offset_des2 = 7;
		$offset_url  = 8;
		$offset_show = 9;
		$offset_pays = 10;
		$offset_clks = 11;
		$offset_avgp = 13;
		
		
		//检查文件头，判断是不是识别的格式

		
		$succ = 0;
		
		$handle = fopen($path, "r");
		if ($handle) {
			$lineNo = 0;
			while ($line = fgetcsv($handle)) {
				// process the line read.
				//从第9行开始
				if($lineNo < 8){$lineNo++;continue;}
				//日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,
				//消费,点击率,平均点击价格,网页转化,商桥转化
				//"2016-03-28",0,"shb-九龙2","性功能-勃起异常","勃起-硬","{男性勃起功能障碍的原因},硬不起来该如何治?",
				//"{男性勃起功能障碍的原因},勃起不坚,时间不长不坚硬的病因是什么,找到病因能一次性治",
				//"吗?上海九龙男子医院专家在线解答勃起问题.","man.long120.cn",1,0,0.00,0.00%,0.00,0,0
				$items = $line;
				$acc   = $this->handleCsv($items[$offset_acc]);
				$plan  = $this->handleCsv($items[$offset_plan]);
				$unit  = $this->handleCsv($items[$offset_unit]);
				$title = $this->handleCsv($items[$offset_titl]);
				$desc1 = $this->handleCsv($items[$offset_des1]);
				$desc2 = $this->handleCsv($items[$offset_des2]);
				$url   = $this->handleCsv($items[$offset_url]);
				$pays  = $this->handleCsv($items[$offset_pays]);
				$shows = $this->handleCsv($items[$offset_show]);
				$clks  = $this->handleCsv($items[$offset_clks]);
				$avgpr = $this->handleCsv($items[$offset_avgp]);
				$date  = $this->handleCsv($items[0] . " " . $items[1] . ":00:00");
				
				$id = $this->_loadPubData($dev,$chananel, $acc, $plan, $unit, $title, $desc1, $desc2, 
						$url, $pays, $shows, $clks, $avgpr, $date);
				
				if($id->isTrue()){
					$succ++;
				}
				
				if(!is_null($this->callback)){
					call_user_func_array($this->callback, array($lineNo,$id));
				}
				$lineNo++;
			}
		
			fclose($handle);
			exit(var_dump($succ));
		} else {
			// error opening the file.
		}
	}
	private function handleCsv($str){
		
		return str_replace('"',"",iconv("GBK", "UTF8", $str));
	}
	/**
	 * 
	 * @param string $dev pc/mobile
	 * @param string $chananel 百度
	 * @param string $account
	 * @param string $plan
	 * @param string $unit
	 * @param string $title
	 * @param string $desc1
	 * @param string $desc2
	 * @param string $url
	 * @param string $paysum
	 * @param string $shows
	 * @param string $clks
	 * @param string $avgprice
	 * @param string $datetime
	 * @return rirResult
	 */
	private function _loadPubData($dev,$chananel,$account,$plan,$unit,$title,$desc1,$desc2,$url,
			$paysum,$shows,$clks,$avgprice,$datetime){
		$ch_id = $this->getChananelId($chananel);
		if($ch_id == 0)return new rirResult(1,"获取频道ID失败");
		$ac_id = $this->getAccountId($ch_id, $account, $dev);
		if($ac_id == 0)return new rirResult(2,"获取帐户ID失败");
		$pl_id = $this->getPlanId($ac_id, $plan);
		if($pl_id == 0)return new rirResult(3,"获取计划ID失败");
		$un_id = $this->getUnitId($pl_id, $unit);
		if($un_id == 0)return new rirResult(4,"获取单元ID失败");
		$id_id = $this->getIdeaId($un_id, $title, $desc1, $desc2, $url);
		if($id_id == 0)return new rirResult(5,"获取创意ID失败");
		
		$sql = "
			INSERT INTO `publ_data` (
				`id_id`,`paysum`,`shows`,`clks`,`avgprice`,`datetime`
			) VALUES (
				:id_id,:paysum,:shows,:clks,:avgprice,:datetime
			)
		";
		$data = array(
			"id_id" => $id_id,
			"paysum" => $paysum,
			"shows" => $shows,
			"clks" => $clks,
			"avgprice" => $avgprice,
			"datetime" => $datetime,

		);
		$id = $this->db->insert($sql, $data);
		if($id > 0){
			return new rirResult(0,"ok",$id);
		}
		return new rirResult(6,$this->db->getErrorInfo());
	}
}