<?php
require_once FILE_SYSTEM_ENTRY."/app/data/default/doctor.uiapi.php";
class doctorsModelControllerNotFound extends AppModel {
	public $data;
	public function __construct() {
		
	}
	
	/**
	 * 根据医生ID获取一个问答
	 * @param int $dod
	 * @param int $length
	 * @return array
	 */
	public function row($aid){
		return articleUIApi::getInstance()->row($aid, 0);
	}
}