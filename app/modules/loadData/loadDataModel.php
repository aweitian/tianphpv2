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
	 */
	public function saveData($uf){
		$error = $uf["error"];
		$tmp_name = $uf["tmp_name"];
		$name = $uf["name"];
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
			move_uploaded_file($tmp_name,$destination);
		}
		
		return array(
				
		);


	}
}