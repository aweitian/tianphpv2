<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/presentValidator.php";
class presentApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/present.xml");
	}
	
	//present no update
	
	public function presentGive($uid,$dod,$pid,$date){
		//validate
		if(!validator::isUint($uid)){
			return new rirResult(1,"invalid uid");
		}
		if(!validator::isUint($dod)){
			return new rirResult(2,"invalid dod");
		}
		if(!validator::isUint($pid)){
			return new rirResult(3,"invalid pid");
		}
		if(!validator::isDateTime($date)){
			return new rirResult(4,"invalid date");
		}
	
		$sql = $this->sqlManager->getSql("/sql/present/give");
		$bnd = array(
				"uid" => $uid,
				"dod" => $dod,
				"pid" => $pid,
				"date" => $date,
		);
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function presentRemove($sid){
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/present/rm"), array(
				"sid" => $sid,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	
	
	public function all(){
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/all"), array());
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function row($sid){
		$ret = $this->db->fetch($this->sqlManager->getSql("/sql/row"), array(
				"sid" => $sid
		));
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	public function add($data,$cost,$benefit,$avatar){
		if(!presentValidator::isValidPresent($data)){
			return new rirResult(2,"invalid data of post");
		}
		if(!presentValidator::isValidAvatar($avatar)){
			return new rirResult(2,"头像格式只能是图片，gif,png,jpg");
		}
		if(!validator::isUint($cost)){
			return new rirResult(2,"消耗积分只能是正整数");
		}
		if(!validator::isUint($benefit)){
			return new rirResult(2,"医生获得的爱心点数只能是正整数");
		}
	
		$ret = $this->db->insert($this->sqlManager->getSql("/sql/add"), array(
				"data" => $data,
				"cost" => $cost,
				"ben" => $benefit,
				"avatar" => $avatar,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function update($sid,$data,$cost,$benefit,$avatar){
		if(!presentValidator::isValidPresent($data)){
			return new rirResult(2,"invalid data of post");
		}
		if(!presentValidator::isValidAvatar($avatar)){
			return new rirResult(2,"头像格式只能是图片，gif,png,jpg");
		}
		if(!validator::isUint($cost)){
			return new rirResult(2,"消耗积分只能是正整数");
		}
		if(!validator::isUint($benefit)){
			return new rirResult(2,"医生获得的爱心点数只能是正整数");
		}
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/update"), array(
				"sid" => $sid,
				"data" => $data,
				"cost" => $cost,
				"ben" => $benefit,
				"avatar" => $avatar,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function remove($sid){
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/remove"), array(
				"sid" => $sid,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
}
