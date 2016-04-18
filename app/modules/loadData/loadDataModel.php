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
			":ch_val" => $chv,
		));
		if(empty($data)){
			return $this->db->insert("INSERT INTO `data_channel` (
				`ch_val`
			) VALUES (
				:ch_val
			)", array(
				":ch_val" => $chv,
			));
		}else{
			return $data["ch_id"];
		}
	}
	
	
	public function getUploadInfo($token){
		return $this->db->fetch("SELECT * FROM `log_upload_token` WHERE `token` = :token", array(
				":token" => $token,
		));
	}
	
	public function loadData($metaData){
		switch($metaData["ch"]){
			case "bd":
				$this->loadDataToDb($metaData["name"],$metaData["dev"]);
				return 0;
			default:
				return 0;
				
		}
	}
	
	public function loadDataToDb($path,$pcmb){
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

		
		
		
		$handle = fopen($path, "r");
		if ($handle) {
			$lineNo = 0;
			while (($line = fgets($handle)) !== false) {
				// process the line read.
				//从第9行开始
				if($lineNo < 9){$lineNo++;continue;}
				//日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,
				//消费,点击率,平均点击价格,网页转化,商桥转化
				//"2016-03-28",0,"shb-九龙2","性功能-勃起异常","勃起-硬","{男性勃起功能障碍的原因},硬不起来该如何治?",
				//"{男性勃起功能障碍的原因},勃起不坚,时间不长不坚硬的病因是什么,找到病因能一次性治",
				//"吗?上海九龙男子医院专家在线解答勃起问题.","man.long120.cn",1,0,0.00,0.00%,0.00,0,0
				$items = explode(",", trim(iconv("GBK", "UTF8", $line)));
				$acc   = $this->stripQuote($items[$offset_acc]);
				$plan  = $this->stripQuote($items[$offset_plan]);
				$unit  = $this->stripQuote($items[$offset_unit]);
				$title = $this->stripQuote($items[$offset_titl]);
				$desc1 = $this->stripQuote($items[$offset_des1]);
				$desc2 = $this->stripQuote($items[$offset_des2]);
				$url   = $this->stripQuote($items[$offset_url]);
				$pays  = $this->stripQuote($items[$offset_pays]);
				$shows = $this->stripQuote($items[$offset_show]);
				$clks  = $this->stripQuote($items[$offset_clks]);
				$avgpr = $this->stripQuote($items[$offset_avgp]);
				$date  = $this->stripQuote($items[0] . " " . $items[1] . ":00:00");
				
				$id = $this->_loadData_bd($pcmb, $acc, $plan, $unit, $title, $desc1, $desc2, 
						$url, $pays, $shows, $clks, $avgpr, $date);
				
				
				if(!is_null($this->callback)){
					call_user_func_array($this->callback, array($lineNo,$id));
				}
				$lineNo++;
			}
		
			fclose($handle);
		} else {
			// error opening the file.
		}
	}
	private function stripQuote($str){
		return str_replace('"',"",$str);
	}
	/**
	 * 
	 * @param string $pcmb
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
	 * @return INSERT ID
	 */
	private function _loadData_bd($pcmb,$account,$plan,$unit,$title,$desc1,$desc2,$url,$paysum,$shows,$clks,$avgprice,$datetime){
		$sql = "
		INSERT INTO `data_idea_bd_".$pcmb."` (
			`account`,`plan`,`unit`,`title`,`desc1`,`desc2`,`url`,`paysum`,`shows`,`clks`,`avgprice`,`datetime`
		) VALUES (
			:account,:plan,:unit,:title,:desc1,:desc2,:url,:paysum,:shows,:clks,:avgprice,:datetime
		)		
		";
		$data = array(
			":account" => $account,
			":plan" => $plan,
			":unit" => $unit,
			":title" => $title,
			":desc1" => $desc1,
			":desc2" => $desc2,
			":url" => $url,
			":paysum" => $paysum,
			":shows" => $shows,
			":clks" => $clks,
			":avgprice" => $avgprice,
			":datetime" => $datetime,
		);
		return $this->db->insert($sql, $data);
	}
	private function _loadData_pc_bd($account,$plan,$unit,$title,$desc1,$desc2,$url,$paysum,$shows,$clks,$avgprice,$datetime){
		return $this->_loadData_bd("pc", $account, $plan, $unit, $title, $desc1, $desc2, $url, $paysum, $shows, $clks, $avgprice, $datetime);
	}
	private function _loadData_mb_bd($account,$plan,$unit,$title,$desc1,$desc2,$url,$paysum,$shows,$clks,$avgprice,$datetime){
		return $this->_loadData_bd("mb", $account, $plan, $unit, $title, $desc1, $desc2, $url, $paysum, $shows, $clks, $avgprice, $datetime);
	}
}