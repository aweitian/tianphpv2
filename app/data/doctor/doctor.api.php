<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */

class doctorApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("doctor");
	}
	
	/**
	 * 只返回SID,NAME
	 * @return array;
	 */
	public function getBaseInfo(){
		$sql = $this->sqlManager->getSql("/sql/base");
		return $this->db->fetchAll($sql, array());
	}
	
	/**
	 * 返回基本信息
	 */
	public function getInfo(){
		
	}
	
	/**
	 * 返回医生职位相关的信息
	 */
	public function getInfoLv(){
		$sql = $this->sqlManager->getSql("/sql/query_infoLv");
		return $this->db->fetchAll($sql, array());
	}
}
