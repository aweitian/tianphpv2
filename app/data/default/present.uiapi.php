<?php
/**
 * 前台TPL文件调用礼物模块接口类
 * @author awei.tian
 * @date   2016-6-25
 */
class presentUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_present.xml");
	}

	
}