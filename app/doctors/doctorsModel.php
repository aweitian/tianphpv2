<?php
require_once FILE_SYSTEM_ENTRY."/app/data/default/doctor.uiapi.php";
class doctorsModelControllerNotFound extends AppModel {
	public $data;
	public function __construct() {
		
	}
	
	/**
	 * 根据医生ID获取一个文章
	 * @param int $dod
	 * @param int $length
	 * @return array
	 */
	public function row($aid){
		return articleUIApi::getInstance()->row($aid, 0);
	}
	public function rowNoContent($aid){
		return articleUIApi::getInstance()->rowNoContent($aid, 0);
	}
	public function allByDod($dod,$length,$offset=0){
		return articleUIApi::getInstance()->allByDod($dod,$length,0);
	}
	
	
	public function getDataByDod($dod,$length,$offset=0){
		return appraiseUIApi::getInstance()->getDataByDod($dod,$length,$offset);
	}
	
	public function getNameByDid($did){
		return diseaseUIApi::getInstance()->getNameByDid($did);
	}
	public function getDataByDodCnt($dod){
		return appraiseUIApi::getInstance()->getDataByDodCnt($dod);
	}
	
	public function rowuser($uid){
		return userUIApi::getInstance()->row($uid);
	}

}