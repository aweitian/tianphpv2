<?php
class helpModel extends AppModel {
	
	public function __construct() {
		
	}
	
	
    public function test($syd){
		return symptomUIApi::getInstance()->alllv1BySyd($syd);
	}
	
	public function getLetterCnt(){
		return letterUIApi::getInstance()->cnt();
	}
	public function getDisease() {
		return diseaseUIApi::getInstance()->getInfo();
	}
	public function getDoctors($length=4){
		return doctorUIApi::getInstance()->getInfoes($length);
	}
	
}