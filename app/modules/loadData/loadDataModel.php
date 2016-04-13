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
		
		
				$lineNo++;
			}
		
			fclose($handle);
		} else {
			// error opening the file.
		}
	}
	private function add(){
		$sql = "INSERT INTO `data_idea_bd_mb`(
				`account`, `plan`, `unit`, `title`, 
				`desc1`, `desc2`, `url`, `paysum`, `shows`, 
				`clks`, `avgprice`, `chat`, `subscribe`, 
				`rcvpayment`, `id_code`, `at_code`, 
				`datetime`
		) VALUES (
			：account, ：plan, ：unit, ：title, 
			：desc1, ：desc2, ：url, ：paysum, ：shows, 
			：clks, ：avgprice, ：chat, ：subscribe, 
			：rcvpayment, ：id_code, ：at_code, 
			：datetime	
				
		)";
		
	}
}