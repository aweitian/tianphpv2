<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/tags.validator.php";
class tagsApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("tags");
	}

	/**
	 * 只返回SID,tags
	 * @return array;
	 */
	public function getAll(){
		$sql = $this->sqlManager->getSql("/tags/all");
		$ret = $this->db->fetchAll($sql, array());
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function rm($sid){
		$sql = $this->sqlManager->getSql("/tags/rm");
		$ret = $this->db->fetchAll($sql, array());
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function add($text){
		//validate
		if(!tagsValidator::isValidtags($tags)){
			return new rirResult(1,"invalid tags");
		}
		
		
		$sql = $this->sqlManager->getSql("/tags/add");
		$bind = array(
			"text" => $text,
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
		if(!tagsValidator::isValidtags($tags)){
			return new rirResult(1,"invalid tags");
		}
		$sql = $this->sqlManager->getSql("/ask/update");
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