<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class letterUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_letter.xml");
	}
	
	public static function getInstance(){
		if(is_null(letterUIApi::$inst)){
			letterUIApi::$inst = new letterUIApi();
		}
		return letterUIApi::$inst;
	}
	
	
}