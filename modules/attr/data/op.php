<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 */
class attr_meta_op{
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
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/attr_meta.xml");
	}
	
	public function add($val,$level,$grp){
		$sql = $this->sqlManager->getSql("/sql/add");
		$data = array(
				"val"=>$val,
				"level"=>$level,
				"grp"=>$grp
		);
		return $this->db->insert($sql, $data);
	}
	
	public function removeById($sid){
		$sql = $this->sqlManager->getSql("/sql/removeById");
		$data = array(
				"sid"=>$sid
		);
		return $this->db->exec($sql, $data);
	}
	public function removeByGrp($grp){
		$sql = $this->sqlManager->getSql("/sql/removeByGrp");
		$data = array(
				"grp"=>$grp
		);
		return $this->db->exec($sql, $data);
	}
	public function updateById($sid){
		$sql = $this->sqlManager->getSql("/sql/updateById");
		$data = array(
				"sid"=>$sid
		);
		return $this->db->exec($sql, $data);
	}
	public function updateVal($sid){
		$sql = $this->sqlManager->getSql("/sql/updateVal");
		$data = array(
				"sid"=>$sid
		);
		return $this->db->exec($sql, $data);
	}
	
	
}