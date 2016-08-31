<?php
class symptomModel extends AppModel {
	
	public function __construct() {
		
	}
	
	public function getLv0Data(){
		return symptomUIApi::getInstance()->alllv0();
	}
	public function getInfo($syd){
		return symptomUIApi::getInstance()->alllv1BySyd($syd);
	}
	public function getDidsBySyd($syd){
		return symptomUIApi::getInstance()->getDidsBySyd($syd);
	}
	public function getNameByDid($did){
		return diseaseUIApi::getInstance()->getNameByDid($did);
	}
	
	public function getInfoes($length){
		return $docinfos=doctorUIApi::getInstance()->getInfoes($length);
	}
	
	public function alllv1BySyd($syd){
		return $alllv1BySyd=symptomUIApi::getInstance()->alllv1BySyd($syd);
	}
	
	
}