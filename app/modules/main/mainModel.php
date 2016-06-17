<?php
require_once FILE_SYSTEM_ENTRY."/app/data/disease/disease.api.php";
class mainModel extends AppModel {
	
	public function __construct() {
		
	}
	
	public function getDisease() {
		$api = new diseaseApi();
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