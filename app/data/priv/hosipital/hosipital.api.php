<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/hosipital.validator.php";
class hosipitalApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/hosipital.xml");
	}

	/**
	 * 只返回SID,hosipital
	 * @return rirResult;
	 */
	public function getAll($length=10,$offset=0){
		$sql = $this->sqlManager->getSql("/hosipital/all");
		$ret = $this->db->fetchAll($sql, array(
				"offset" => $offset,
				"length" => $length,
		));
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function row($sid){
		$sql = $this->sqlManager->getSql("/hosipital/row");
		$ret = $this->db->fetch($sql, array("sid"=>$sid));
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	public function rm($sid){
		$sql = $this->sqlManager->getSql("/hosipital/rm");
		$ret = $this->db->exec($sql, array("sid"=>$sid));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function add($name,$dis,$hot,$expert){
		//validate
		if(!hosipitalValidator::isValidName($name)){
			return new rirResult(1,"invalid hosipital");
		}
		
		
		$sql = $this->sqlManager->getSql("/hosipital/add");
		$bind = array(
			"name" => $name,
			"hot" => $hot,
			"dis" => $dis,
			"expert" => $expert,
		);
		$sid = $this->db->insert($sql, $bind);
		if($sid == 0){
			if($this->db->hasError()){
				return new rirResult(9,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$sid);
	}
	
	public function update($sid,$text){
		//validate
		if(!hosipitalValidator::isValidTags($text)){
			return new rirResult(1,"invalid hosipital");
		}
		$sql = $this->sqlManager->getSql("/hosipital/update");
		$bind = array(
				"sid" => $sid,
				"text" => $text,
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