<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/commentValidator.php";
class commentApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("artical_comment");
	}
	
	public function row($sid){
		$sql = $this->sqlManager->getSql("/artical_comment/row");
		$bnd = array("sid" => $sid);
		return $this->db->fetch($sql, $bnd);
	}
	
	/**
	 *
	 * @param int $uid
	 * @param int $aid
	 * @param string $comment
	 * @return rirResult
	 */
	public function add($aid,$uid,$comment){
	
		//validate data
		if(!validator::isUint($uid)){
			return new rirResult(1,"invalid uid");
		}
		if(!validator::isUint($aid)){
			return new rirResult(2,"invalid aid");
		}
		if(!commentValidator::isValidTitle($comment)){
			return new rirResult(3,"invalid comment");
		}
	
		$sql = $this->sqlManager->getSql("/artical_comment/add");
		$bind = array(
				"uid" => $uid,
				"aid" => $aid,
				"comment" => $comment,
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
	 * @param bool $vertify
	 * @param string $comment
	 * @return rirResult
	 */
	public function update($sid,$vertify,$comment){
	
		//validate data
		if(!validator::isUint($sid)){
			return new rirResult(1,"invalid sid");
		}
		if(!commentValidator::isValidVertify($vertify)){
			return new rirResult(5,"invalid vertify");
		}
		if(!commentValidator::isValidComment($comment)){
			return new rirResult(6,"invalid comment");
		}
	
		$sql = $this->sqlManager->getSql("/artical_comment/update");
		$bind = array(
				"sid" => $sid,
				"vertify" => $vertify,
				"comment" => $comment,
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
		$ret = $this->db->exec($this->sqlManager->getSql("/artical_comment/rm"), array(
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
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllComments($q,$offset,$length){
		$sql = $this->sqlManager->getSql("/artical_comment/all/count");
		$bin = array("q" => $q ? $q : "");
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/artical_comment/all/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $uid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllCommentsByUid($uid,$offset,$length){
		$sql = $this->sqlManager->getSql("/artical_comment/all_uid/count");
		$bin = array("uid" => $uid);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/artical_comment/all_uid/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $aid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllCommentsByAid($aid,$offset,$length){
		$sql = $this->sqlManager->getSql("/artical_comment/all_aid/count");
		$bin = array("aid" => $aid);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/artical_comment/all_aid/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
}