<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class appraiseUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_appraise.xml");
	}
	
	/**
	 * 
	 * @param int $length
	 */
	public function getData($length){
		
	}
	 
	
	
}