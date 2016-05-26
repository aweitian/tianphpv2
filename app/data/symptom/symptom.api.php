<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
class symptomApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("symptom");
	}

	/**
	 * 只返回SID,NAME
	 * @return array;
	 */
	public function getBaseInfo(){
		$sql = $this->sqlManager->getSql("/sql/base");
		return $this->db->fetchAll($sql, array());
	}
}