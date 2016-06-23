<?php
require_once FILE_SYSTEM_ENTRY."/app/data/disease.uiapi.php";
class diseaseModel extends AppModel {
	public function __construct() {
		
	}
	
	/**
	 * 返回类似下面的二维数组
	 * 
	 * pid  	pd		mid  	md       	url    
	 * ------  	------	------  --------	-------- 
	 * 322  	男性不育	327  	男性不育症		nxbyz
	 * 322  	男性不育	326  	肾虚           		sx 
	 */
	public function getDisease() {
		$api = new diseaseUIApi();
		return $api->getInfo();
	}
	
	public function getRowByDiskey($urlkey) {
		$api = new diseaseUIApi();
		return $api->getRowByDiskey($urlkey);
	}
	
	
}