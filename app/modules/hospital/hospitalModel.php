<?php
require_once FILE_SYSTEM_ENTRY."/app/data/_meta/appraiseLvMeta.php";
class hospitalModel extends AppModel {
	
	public function __construct() {
		
	}
	
	
	public function getUserRowByUid($uid){
		return userUIApi::getInstance()->row($uid);
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