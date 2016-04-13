<?php
/**
 *  实现登陆次数超过设定值时就需要验证码
 *  在验证码打开的情况下再错误一定次数就拒绝登陆
 *  判断标准是以IP加每天再加操作类型（比如登陆和发贴就不是同一个操作类型）进行判断
 */
require_once FILE_SYSTEM_ENTRY."/lib/modules/oplog/IOp.php";
require_once FILE_SYSTEM_ENTRY."/lib/modules/oplog/oplog.php";
require_once FILE_SYSTEM_ENTRY."/lib/modules/priv/privAuth.php";
require_once FILE_SYSTEM_ENTRY."/lib/modules/captcha/captcha.php";

class priv implements IInstall,IOp{
	/**
	 * @var identityToken
	 */
	private $idtoken;
	private $opsid;
	/**
	 * 
	 * @var oplog
	 */
	private $oplog;
	private $conf;
	private $tb_postfix = "priv";
	public $errorMsg;
	public $remain_times = 0;
	
	public function __construct() {
		if (is_null(tian::$pdoBase)) {
			tian::throwException("7399");
		}
		$this->conf = require "app/conf/auth.php";
		$this->idtoken = tian::$identityToken;
		$auth = new session_privAuth();
		$this->idtoken->setInfo($auth->getInfo());
		$this->idtoken->setRoleCode($auth->getRoleCode());
		$roleCode = require "app/conf/rolecode.php";
		if(!array_key_exists($this->idtoken->getRoleCode(), $roleCode)){
			$this->idtoken->setRoleCode("guest");
		}
	}
	public function install() {
		$sql = file_get_contents("lib/modules/priv/install.sql");
		$sql = str_replace("xxxx_priv",$this->getTabelName(),$sql);
		tian::$pdoBase->exec($sql, array());
	}
	public function uninstall() {
		$sql = file_get_contents("lib/modules/priv/uninstall.sql");
		$sql = str_replace("xxxx_priv",$this->getTabelName(),$sql);
		tian::$pdoBase->exec($sql, array());
	}
	public function getTabelName() {
		return TABLE_PREFIX."_".$this->tb_postfix;
	}
	
	public function all(){
		return tian::$pdoBase->fetchAll("select * from `".$this->getTabelName()."` where 1", array());
	}
	public function infoById($sid){
		$row = tian::$pdoBase->fetch("select * from `".$this->getTabelName()."` where `id`=:sid", array(
				"sid"=>$sid
		));
		return $row;
	}
	public function infoByNamePwd($name,$pwd){
		$row = tian::$pdoBase->fetch("select * from `".$this->getTabelName()."` where `name`=:name and `pass`=:pass", array(
				"name"=>$name,
				"pass"=>app::calcPwd($pwd)
		));
		return $row;
	}
	
	
	
	public function checkByNamePwd($name,$pwd,$code=""){
		$this->remain_times = $this->getRemainTryTimes();
		if($this->remain_times<=0){
			$this->errorMsg="Exceed Max try times.";
			return false;
		}
		$this->opStart();
		if(!$this->_checkVc($code)){
			$this->errorMsg = "Invalid verification code";
			$this->opUpdate();
			return false;
		}
		$ret = $this->infoByNamePwd($name, $pwd);
		if(empty($ret)){
			$this->errorMsg = "Invalid name or password";
			$this->opUpdate();
			return false;
		}
		return $this->_saveInfo($ret);
	}
	public function getRemainTryTimes(){
		return $this->conf["u_try_times_max"] - $this->getOPFailCnt();
	}
	public function getUiData(){
		$ret = array(
			"Name"=>"<input type=\"text\" name=\"name\">",
			"Password"=>"<input type=\"password\" name=\"pwd\">",
		);
		$failCnt = $this->getOPFailCnt();
		if($failCnt>$this->conf["u_try_times"]){
			$ret["Verification code"] = "<input type=\"text\" name=\"code\">";
			$ret["code_img"] = "<img src=\"".HTTP_ENTRY."/captcha\">";
		}
		return $ret;
	}
	public function isLogined(){
		return $this->idtoken->getRoleCode() == "privUsr";
	}
	public function getRoleCode(){
		return $this->idtoken->getRoleCode();
	}
	public function getUserInfo(){
		return $this->idtoken->getInfo();
	}
	public function logout(){
		$auth = new session_privAuth();
		$auth->logout();
		$this->idtoken->setRoleCode("guest");
	}
	
	private function _checkVc($code){
		if($this->conf["open"]){
			//检查是否需要验证码
			$failCnt = $this->getOPFailCnt();
			if($failCnt>$this->conf["u_try_times"]){
				$helper = new session_captcha();
				return $helper->check($code);
			}
			return true;
		}
		return true;
	}
	
	private function _saveInfo($ret){
		$auth = new session_privAuth();
		$info = array(
			"sid"=>$ret["id"],
			"name"=>$ret["name"],
			"privilege"=>$ret["privilege"],
		);
		$auth->saveInfo($info);
		$auth->saveRoleCode("privUsr");
		$this->idtoken->setInfo($info);
		$this->idtoken->setRoleCode("privUsr");
		return true;
	}
	public function getOpType(){
		return "privUsr_auth";
	}	
	public function opStart(){
		$this->oplog = new oplog();
		$this->opsid = $this->oplog->add($this->getOpType(), $this->idtoken->getIp());
	} 
	public function opUpdate(){
		if($this->opsid){
			$this->oplog->update($this->opsid);
		}
	}
	public function getOPFailCnt(){
		$priv = new oplog();
		return $priv->getCnt($this->getOpType(), $this->idtoken->getIp());
	}
}