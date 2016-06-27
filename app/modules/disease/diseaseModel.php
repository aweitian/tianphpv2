<?php
require_once FILE_SYSTEM_ENTRY."/app/data/default/disease.uiapi.php";
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
	
	/**
	 * 根据病种ID获取疾病知识的文章
	 * 最多只返回一篇
	 * sid  thumb                              title   desc    
	 * 30  /uploads/user/201606211043371.png  tald    sdalfkwe
	 * @param int $did
	 * @return array fetch
	 */
	public function getArticalTag7ByDid($did){
		$api = new diseaseUIApi();
		return $api->getArticalTag7ByDid($did);
	}
}