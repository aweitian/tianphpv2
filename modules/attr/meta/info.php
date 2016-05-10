<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 */
class attr_meta_info{
	/**
	 * 
	 * @var mysqlPdoBase
	 */
	private $db;
	
	/**
	 * 
	 * @var sqlManager $sqlManager
	 */
	private $sqlManager;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("attr_meta");
	}
	
	/**
	 * 
	 * @param int $sid
	 */
	public function getInfoById($sid){
		$sql = $this->sqlManager->getSql("/sql/getInfoById");
		$data = array(
			"sid"=>$sid
		);
		return $this->db->fetch($sql, $data);
	}
	
	/**
	 * 
	 * @param int $grp
	 */
	public function getInfoesByGrp($grp){
		$sql = $this->sqlManager->getSql("/sql/getInfoesByGrp");
		$data = array(
				"grp"=>$grp
		);
		return $this->db->fetchAll($sql, $data);
	}
	
	
}