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
		$name = time();
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
		$handle = fopen($path, "r");
		if ($handle) {
			$lineNo = 0;
			while (($line = fgets($handle)) !== false) {
				// process the line read.
				//从第9行开始
				if($lineNo < 9){$lineNo++;continue;}
				//日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,
				//消费,点击率,平均点击价格,网页转化,商桥转化
				
				
				
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