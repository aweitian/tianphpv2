<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/letterValidator.php";
class letterApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/letter.xml");
	}
	
	public function row($sid){
		$sql = $this->sqlManager->getSql("/letter/row");
		$bnd = array("sid" => $sid);
		return $this->db->fetch($sql, $bnd);
	}
	
	/**
	 *
	 * @param int $uid
	 * @param int $dod
	 * @param int $did
	 * @param string $content
	 * @param date $date
	 * @return rirResult
	 */
	public function add($uid,$dod,$did,$content,$date){
		//validate data
		if(!validator::isDate($date)){
			return new rirResult(1,"invalid date");
		}
		if(!validator::isUint($uid)){
			return new rirResult(2,"invalid uid");
		}
		if(!validator::isUint($dod)){
			return new rirResult(3,"invalid dod");
		}
		if(!validator::isUint($did)){
			return new rirResult(4,"invalid did");
		}
		if(!letterValidator::isValidContent($content)){
			return new rirResult(5,"invalid content");
		}
	
		$sql = $this->sqlManager->getSql("/letter/add");
		$bind = array(
			"uid" => $uid,
			"dod" => $dod,
			"did" => $did,
			"content" => $content,
			"date" => $date,
		);
		$sid = $this->db->insert($sql, $bind);
		if($sid == 0){
			if($this->db->hasError()){
				return new rirResult(9,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$sid);
	}
	
	/**
	 *
	 * @param int $sid
	 * @param string $letter
	 * @return rirResult
	 */
	public function update($sid,$uid,$dod,$did,$content,$date){
	
		//validate data
		if(!validator::isDate($date)){
			return new rirResult(1,"invalid date");
		}
		if(!validator::isUint($uid)){
			return new rirResult(2,"invalid uid");
		}
		if(!validator::isUint($dod)){
			return new rirResult(3,"invalid dod");
		}
		if(!validator::isUint($did)){
			return new rirResult(4,"invalid did");
		}
		if(!letterValidator::isValidContent($content)){
			return new rirResult(5,"invalid content");
		}
	
		$sql = $this->sqlManager->getSql("/letter/update");
		$bind = array(
			"sid" => $sid,
			"uid" => $uid,
			"dod" => $dod,
			"did" => $did,
			"content" => $content,
			"date" => $date,
		);
		$sid = $this->db->exec($sql, $bind);
		if($sid == 0){
			if($this->db->hasError()){
				return new rirResult(9,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$sid);
	}
	
	
	public function remove($sid){
		$ret = $this->db->exec($this->sqlManager->getSql("/letter/rm"), array(
				"sid" => $sid,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $uid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllLettersByUid($uid,$offset,$length){
		$sql = $this->sqlManager->getSql("/letter/all_uid/cnt");
		$bin = array("uid" => $uid);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/letter/all_uid/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $dod
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllLettersByDod($dod,$offset,$length){
		$sql = $this->sqlManager->getSql("/letter/all_dod/cnt");
		$bin = array("dod" => $dod);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/letter/all_dod/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	
	
	public function getAll($offset,$length){
		$sql = $this->sqlManager->getSql("/letter/all/cnt");
		$bin = array();
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/letter/all/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	
}
