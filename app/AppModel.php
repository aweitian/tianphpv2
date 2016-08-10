<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/default/appraise.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/article.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/ask.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/comment.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/disease.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/doctor.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/letter.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/present.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/symptom.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/tags.uiapi.php";
require_once FILE_SYSTEM_ENTRY."/app/data/default/user.uiapi.php";

class AppModel extends Model{
	/**
	 * 
	 * @var sqlManager
	 */
	protected $sqlManager;
	public function __construct() {
	}
	protected function initDb(){
		$this->initMySqlDb();
	}
	protected function initSqlManager($name){
		$this->sqlManager = new sqlManager($name);
	}
	public function utf8cut($str, $from, $len){
		return utility::utf8Substr(strip_tags($str), $from, $len);
	}
}