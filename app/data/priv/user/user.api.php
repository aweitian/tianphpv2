<?php
/**
 * Date: 2016年6月6日
 * Auth: Awei.tian
 * Desc:
 *
 */
require_once dirname(__FILE__)."/userValidator.php";
require_once dirname(__FILE__)."/userFilter.php";
class userApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/user.xml");
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
	public function getWaterArm(){
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/getWaterArm"), array());
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	public function getRpq($sid){
		$ret = $this->db->fetch($this->sqlManager->getSql("/sql/getRpq"), array(
				"sid" => $sid
		));
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	public function forceResetPwd($sid,$pwd){
		//validate
	
		if(!userValidator::isValidPwd($pwd)){
			return new rirResult(2,"密码长度要大于2");
		}
	
		//filter
	
		$pwd = userFilter::filterPwd($pwd);
	
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
	
	
	public function updateEml($sid,$eml){
		if(!Validator::isEmail($eml)){
			return new rirResult(2,"EMAIL格式不正确");
		}
	
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/updateEml"), array(
				"sid" => $sid,
				"email" => $eml,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	public function updatePwd($sid,$old,$new){
		if(!userValidator::isValidPwd($pwd)){
			return new rirResult(2,"密码长度要大于2");
		}
	
		//filter
	
		$pwd = userFilter::filterPwd($pwd);
	
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/updatepwd"), array(
				"sid" => $sid,
				"opwd" => $old,
				"npwd" => $new,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,"原始密码不正确");
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function ResetPwd($sid,$pwd,$rpq,$rpa){
		//validate
	
		if(!userValidator::isValidPwd($pwd)){
			return new rirResult(2,"密码长度要大于2");
		}
	
		//filter
	
		$pwd = userFilter::filterPwd($pwd);
	
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/resetpwd"), array(
				"sid" => $sid,
				"pwd" => $pwd,
				"rpq" => $rpq,
				"rpa" => $rpa,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,"密保问题答案不正确");
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function q($q,$offset,$len){
		$cnt = $this->db->fetch($this->sqlManager->getSql("/sql/query_count"), array(
				"q" => $q
		));
	
		$cnt = $cnt["count"];
	
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/query"), array(
				"q" => $q,
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
	
	public function register($email,$name,$pwd,$phone,$avatar,$rpq,$rpa){
		return $this->add($email, $name, $pwd, $phone, $avatar, $rpq, $rpa, date("Y-m-d"));
	}
	
	
	
	
	public function add($email,$name,$pwd,$phone,$avatar,$rpq,$rpa,$date,$waf){
	
		//validate
	
		if(!validator::isEmail($email)){
			return new rirResult(2,"invalid email of post");
		}
		if(!userValidator::isValidName($name)){
			return new rirResult(2,"昵称格式不正确");
		}
		if(!userValidator::isValidPwd($pwd)){
			return new rirResult(2,"密码长度要大于2");
		}
	
		if($phone != ""){
			if(!userValidator::isValidPhone($phone)){
				return new rirResult(2,"手机格式不正确");
			}
		}
	
		if(!userValidator::isValidAvatar($avatar)){
			return new rirResult(2,"头像必须以gif,jpg,png结尾");
		}
		if(!userValidator::isValidRpq($rpq)){
			return new rirResult(2,"invalid rpq of post");
		}
		if(!userValidator::isValidRpa($rpa)){
			return new rirResult(2,"invalid rpa of post");
		}
		if(!validator::isDate($date)){
			return new rirResult(2,"invalid date of post");
		}
		if(!userValidator::isValidWa($waf)){
			return new rirResult(2,"invalid waf of post");
		}
	
	
		//filter
	
		$pwd = userFilter::filterPwd($pwd);
	
	
		//insert
		$ret = $this->db->insert($this->sqlManager->getSql("/sql/add"), array(
				"email" => $email,
				"name" => $name,
				"pwd" => $pwd,
				"phone" => $phone,
				"avatar" => $avatar,
				"rpq" => $rpq,
				"rpa" => $rpa,
				"date" => $date,
				"wa" => $waf,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function update($sid,$email,$name,$phone,$avatar,$date){
		//validate
	
		if(!validator::isEmail($email)){
			return new rirResult(2,"invalid email of post");
		}
		if(!userValidator::isValidAvatar($avatar)){
			return new rirResult(2,"头像必须以gif,jpg,png结尾");
		}
		if(!validator::isDate($date)){
			return new rirResult(2,"invalid date of post");
		}
		if($phone != ""){
			if(!userValidator::isValidPhone($phone)){
				return new rirResult(2,"手机格式不正确");
			}
		}
		if(!userValidator::isValidName($name)){
			return new rirResult(2,"昵称格式不正确");
		}
	
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/update"), array(
				"sid" => $sid,
				"email" => $email,
				"name" => $name,
				"phone" => $phone,
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