<?php
require_once FILE_SYSTEM_ENTRY."/app/data/priv/disease.uiapi.php";
class mainModel extends AppModel {
	
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
	
	
	public function getDiseaseLv0(){
		$api = new diseaseApi();
		return $api->getLv0Infoes();
	}
	public function getArtical(){
		$api = new articalApi();
		return $api->getList();
	}
	
	
}