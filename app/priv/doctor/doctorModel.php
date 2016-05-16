<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
class doctorModel extends privModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
		$this->initSqlManager("doctor");
	}
	
	public function add($id,$name,$pwd,$avatar,$date){
	
		//validate
	
		if(!doctorValidator::isValidId($id)){
			return new rirResult(2,"无效的登陆名，只能是字母数字和下划线");
		}
		if(!doctorValidator::isValidName($name)){
			return new rirResult(2,"姓名格式不正确");
		}
		if(!doctorValidator::isValidPwd($pwd)){
			return new rirResult(2,"密码长度要大于2");
		}
	
		if(!doctorValidator::isValidAvatar($avatar)){
			return new rirResult(2,"头像必须以gif,jpg,png结尾");
		}
		if(!validator::isDate($date)){
			return new rirResult(2,"时间格式不正确");
		}
	
	
		//filter
	
		$pwd = doctorFilter::filterPwd($pwd);
	
	
		//insert
		$ret = $this->db->insert($this->sqlManager->getSql("/sql/add"), array(
				"id" => $id,
				"name" => $name,
				"pwd" => $pwd,
				"avatar" => $avatar,
				"date" => $date,
	
		));
		if($ret == 0){
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
	public function getList($offset=0,$len=10){
		$cnt = $this->db->fetch($this->sqlManager->getSql("/sql/count"), array());
	
		$cnt = $cnt["count"];
	
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/all"), array(
				"offset" => $offset,
				"length" => $len
		));
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",array(
				"data" => $ret,
				"count" => $cnt
		));
	}
	
	public function update($sid,$id,$name,$avatar,$date){
	
		//validate
	
		if(!doctorValidator::isValidId($id)){
			return new rirResult(2,"无效的登陆名，只能是字母数字和下划线");
		}
		if(!doctorValidator::isValidName($name)){
			return new rirResult(2,"姓名格式不正确");
		}
	
		if(!doctorValidator::isValidAvatar($avatar)){
			return new rirResult(2,"头像必须以gif,jpg,png结尾");
		}
		if(!validator::isDate($date)){
			return new rirResult(2,"时间格式不正确");
		}
	
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/update"), array(
				"sid" => $sid,
				"id" => $id,
				"name" => $name,
				"avatar" => $avatar,
				"date" => $date
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function forceResetPwd($sid,$pwd){
		//validate
	
		if(!doctorValidator::isValidPwd($pwd)){
			return new rirResult(2,"密码长度要大于2");
		}
	
		//filter
	
		$pwd = doctorFilter::filterPwd($pwd);
	
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/resetpwdForce"), array(
			"sid" => $sid,
			"pwd" => $pwd
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function doctor_lv_all(){
		$ret = $this->db->fetchAll(sqlManager::getInstance("doctor_lv")->getSql("/sql/all"), array());
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function doctor_lv_add($data){
		if(!doctor_lv_validator::isValidDoctorLv($data)){
			return new rirResult(2,"invalid data of post");
		}
		$ret = $this->db->insert(sqlManager::getInstance("doctor_lv")->getSql("/sql/add"), array(
			"data" => $data
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function doctor_lv_update($sid,$data){
		if(!doctor_lv_validator::isValidDoctorLv($data)){
			return new rirResult(2,"invalid data of post");
		}
		$ret = $this->db->exec(sqlManager::getInstance("doctor_lv")->getSql("/sql/update"), array(
			"sid" => $sid,
			"data" => $data
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function doctor_lv_remove($sid){
		$ret = $this->db->exec(sqlManager::getInstance("doctor_lv")->getSql("/sql/remove"), array(
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