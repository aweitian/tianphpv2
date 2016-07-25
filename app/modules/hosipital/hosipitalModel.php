<?php
require_once FILE_SYSTEM_ENTRY."/app/data/_meta/appraiseLvMeta.php";
class hosipitalModel extends AppModel {
	
	public function __construct() {
		
	}
	
	public function all($length,$offset=0){
		return articleUIApi::getInstance()->all($length,$offset);
	}
	
	public function row($aid){
		return articleUIApi::getInstance()->row($aid, 0);
	}
}