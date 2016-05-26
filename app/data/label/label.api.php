<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/label.validator.php";
class labelApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("label");
	}

	/**
	 * 只返回SID,LABEL
	 * @return array;
	 */
	public function getAll(){
		$sql = $this->sqlManager->getSql("/label/all");
		$ret = $this->db->fetchAll($sql, array());
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function rm($sid){
		$sql = $this->sqlManager->getSql("/label/rm");
		$ret = $this->db->fetchAll($sql, array());
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function add($label){
		//validate
		if(!labelValidator::isValidLabel($label)){
			return new rirResult(1,"invalid label");
		}
		
		
		$sql = $this->sqlManager->getSql("/label/add");
		$bind = array(
			"label" => $label,
		);
		$sid = $this->db->insert($sql, $bind);
		if($sid == 0){
			if($this->db->hasError()){
				return new rirResult(9,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$sid);
	}
	
	public function update($sid,$label){
		//validate
		if(!labelValidator::isValidLabel($label)){
			return new rirResult(1,"invalid label");
		}
		$sql = $this->sqlManager->getSql("/ask/update");
		$bind = array(
				"sid" => $sid,
				"label" => $label,
		);
		$sid = $this->db->exec($sql, $bind);
		if($sid == 0){
			if($this->db->hasError()){
				return new rirResult(9,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$sid);
	}
}