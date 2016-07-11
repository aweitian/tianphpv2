<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class uploadModel extends privModel{
	public function __construct(){
		parent::__construct();
	}
	public function clean(rirResult $uploadResult){
		$data = tian::getFileList(FILE_SYSTEM_ENTRY."");
		foreach ($uploadResult->return["succ"] as $file){
			
		}
	}
}