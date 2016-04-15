<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
class loadDataModel extends AppModel{
	
	public function __construct(){
		parent::__construct();
		$this->initDb();
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
		$name = $uf["tmp_name"];
		exit($name);
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
	public function loadDataToDb($path){
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
				$items = explode(",", $line);
				$acc   = $items[$offset_acc];
				$plan  = $items[$offset_plan];
				$unit  = $items[$offset_unit];
				$title = $items[$offset_titl];
				$desc1 = $items[$offset_des1];
				$desc2 = $items[$offset_des2];
				$url   = $items[$offset_url];
				$pays  = $items[$offset_pays];
				$shows = $items[$offset_show];
				$clks  = $items[$offset_clks];
				$avgpr = $items[$offset_avgp];
				$date  = $items[0] . " " . $items[1] . ":00:00";
				
				
				$lineNo++;
			}
		
			fclose($handle);
		} else {
			// error opening the file.
		}
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