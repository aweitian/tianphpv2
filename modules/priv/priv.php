<?php
/**
 *  实现登陆次数超过设定值时就需要验证码
 *  在验证码打开的情况下再错误一定次数就拒绝登陆
 *  判断标准是以IP加每天再加操作类型（比如登陆和发贴就不是同一个操作类型）进行判断
 */

require_once FILE_SYSTEM_ENTRY."/modules/algorithms/Security.php";
require_once FILE_SYSTEM_ENTRY."/modules/oplog/IOp.php";
require_once FILE_SYSTEM_ENTRY."/modules/oplog/oplog.php";
require_once FILE_SYSTEM_ENTRY."/modules/priv/privAuth.php";
require_once FILE_SYSTEM_ENTRY."/modules/captcha/captcha.php";

class priv implements IOp{
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
	private $tb_prefix  = "data_";
	public $errorMsg;
	public $remain_times = 0;
	/**
	 * 
	 * @var mysqlPdoBase
	 */
	private $db;
	
	/**
	 * 
	 * @var session
	 */
	private $session;
	/**
	 * 
	 * @param session $session
	 * @param string $tb_prefix
	 * @param array $conf  u_try_times_max/u_try_times/open  是否需要验证码
	 */
	public function __construct(session $session,$tb_prefix = null,$conf = null,$roleCode = null) {
		$this->session = $session;
		if(is_string($tb_prefix)){
			$this->tb_prefix = $tb_prefix;
		}
		$this->db = new mysqlPdoBase();
		$this->conf = is_array($conf) ? $conf : array(
			"u_try_times"     => 5,
			"u_try_times_max" => 20,
			"open"            => true  //是否需要验证码
		);
		$this->idtoken = identityToken::getInstance();
		$auth = new session_privAuth($this->session);
		$this->idtoken->setInfo($auth->getInfo());
		$this->idtoken->setRoleCode($auth->getRoleCode());
		$role = is_array($roleCode) ? $roleCode : array(
			"guest" => "Guest",
			"privUsr"  => "User",
			"root"  => "Administrator"
		);
		if(!array_key_exists($this->idtoken->getRoleCode(), $role)){
			$this->idtoken->setRoleCode("guest");
		}
	}
	public function getTabelName() {
		return $this->tb_prefix.$this->tb_postfix;
	}
	
	public function all(){
		return $this->db->fetchAll("select * from `".$this->getTabelName()."` where 1", array());
	}
	public function infoById($sid){
		$row = $this->db->fetch("select * from `".$this->getTabelName()."` where `id`=:sid", array(
			"sid"=>$sid
		));
		return $row;
	}
	public function infoByEmailPwd($email,$pwd){
		$row = $this->db->fetch("select * from `".$this->getTabelName()."` where `email`=:email and `pass`=:pass", array(
				"email"=>$email,
				"pass"=>Security::encrypt($pwd)
		));
		return $row;
	}
	
	
	
	public function check($email,$pwd,$code=""){
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
		$ret = $this->infoByEmailPwd($email, $pwd);
		if(empty($ret)){
			$this->errorMsg = "Invalid name or password";
			$this->opUpdate();
			return false;
		}
		return $this->_saveInfo($ret);
	}
	public function getRemainTryTimes(){
		return $this->conf["u_try_times_max"] - $this->getOpFailCnt();
	}
	public function getUiData(){
		$ret = array(
			"Name"=>"<input type=\"text\" name=\"email\">",
			"Password"=>"<input type=\"password\" name=\"pwd\">",
		);
		$failCnt = $this->getOpFailCnt();
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
		$auth = new session_privAuth($this->session);
		$auth->logout();
		$this->idtoken->setRoleCode("guest");
	}
	
	private function _checkVc($code){
		if($this->conf["open"]){
			//检查是否需要验证码
			$failCnt = $this->getOpFailCnt();
			if($failCnt>$this->conf["u_try_times"]){
				$helper = new session_captcha($this->session);
				return $helper->check($code);
			}
			return true;
		}
		return true;
	}
	
	private function _saveInfo($ret){
		$auth = new session_privAuth($this->session);
		$info = array(
			"sid"=>$ret["id"],
			"email"=>$ret["email"],
			"privilege"=>$ret["privilege"],
			"time"=>$ret["time"]
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
	public function getOpFailCnt(){
		$priv = new oplog();
		return $priv->getCnt($this->getOpType(), $this->idtoken->getIp());
	}
}