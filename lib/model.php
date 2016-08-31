<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */
class Model{
	/**
	 * @var IPdoBase
	 */
	protected $db;
	public function __construct(){
		
	}
	protected function initMySqlDb(){
		require_once FILE_SYSTEM_ENTRY."/lib/db/mysql/mysqlPdoBase.php";
		$this->db = new mysqlPdoBase();
	}
}