<?php
/**
 * 用户前端模块
 * @author awei.tian
 * @date   2016-6-27
 */
require_once FILE_SYSTEM_ENTRY . "/app/data/priv/user/userValidator.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/priv/user/userFilter.php";
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/IOp.php";
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/oplog.php";
require_once FILE_SYSTEM_ENTRY . "/modules/captcha/captcha.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/_meta/avatarMeta.php";
class userUIApi implements IOp {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array ();
	private $waterArmCache = array ();
	
	/**
	 *
	 * @var session
	 */
	private $session;
	/**
	 *
	 * @var oplog
	 */
	private $oplog;
	private $conf;
	private $tb_postfix = "user";
	private $tb_prefix = "data_";
	public $errorMsg;
	public $remain_times = 0;
	/**
	 *
	 * @var identityToken
	 */
	private $idtoken;
	private $opsid;
	private function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/default/ui_user.xml" );
		$this->initWaterArm ();
	}
	
	/**
	 *
	 * @return userUIApi
	 */
	public static function getInstance() {
		if (is_null ( userUIApi::$inst )) {
			userUIApi::$inst = new userUIApi ();
		}
		return userUIApi::$inst;
	}
	
	/**
	 * 获取全部用户个数
	 *
	 * @return int;
	 */
	public function getAllCnt() {
		$cache_key = "getAllCnt";
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_user/cnt" );
		$row = $this->db->fetch ( $sql, array () );
		$ret = $row ["cnt"];
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取用户姓名
	 *
	 * @param int $uid        	
	 * @return string;
	 */
	public function getNameByUid($uid) {
		$cache_key = "getNameByUid-" . $uid;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$ret = $this->row ( $uid );
		if (empty ( $ret )) {
			$ret = "";
		} else {
			$ret = $ret ["name"];
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 返回字段:sid,email,name,phone,avatar,rpq,rpa,wa,date
	 * 字段说明:
	 * rpq为密码找回问题,
	 * rpa为密码找回答案
	 * wa y为水军，n为正常注册用户
	 *
	 * @param int $uid        	
	 * @return array;
	 */
	public function row($uid) {
		$cache_key = "row-" . $uid;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		if (! array_key_exists ( $uid, $this->waterArmCache )) {
			$sql = $this->sqlManager->getSql ( "/ui_user/row_uid" );
			$ret = $this->db->fetch ( $sql, array (
					"uid" => $uid 
			) );
		} else {
			$ret = $this->waterArmCache [$uid];
		}
		
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	// 前端操作
	
	/**
	 *
	 * @param int $uid        	
	 * @param string $newavatar
	 *        	(只要BASENAME部分)
	 * @return rirResult
	 */
	public function avatar($uid, $newavatar) {
		$op_type = "user_modify";
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $uid );
		if (USER_MOD_PROFILE_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天编辑次数过多" );
		}
		$opsid = $oplog->add ( $op_type, $uid );
		$oplog->update ( $opsid );
		$avatarMeta = avatarMeta::getAllAvatar ();
		
		if (! in_array ( $newavatar, $avatarMeta )) {
			return new rirResult ( 2, "头像不存在" );
		}
		
		$sql = $this->sqlManager->getSql ( "/ui_user/profile/avatar" );
		$row = $this->db->exec ( $sql, array (
				"uid" => $uid,
				"avatar" => $newavatar 
		) );
		if ($row == 1) {
			$sql = $this->sqlManager->getSql ( "/ui_user/row_uid" );
			$ret = $this->db->fetch ( $sql, array (
					"uid" => $uid 
			) );
			return new rirResult ( 0, "ok", $ret );
		}
		return new rirResult ( 3, "头像没有变化" );
	}
	
	private function initWaterArm() {
		$data = $this->db->fetchAll ( $this->sqlManager->getSql ( "/ui_user/waterarm" ), array () );
		foreach ( $data as $item ) {
			$this->waterArmCache [$item ["sid"]] = $item;
		}
	}
	
	// 登陆
	public function initLogin(session $session) {
		$this->session = $session;
		$this->conf = array (
				"u_try_times" => USER_LOGIN_TRY_TIMES,
				"u_try_times_max" => USER_LOGIN_TRY_MAX,
				"open" => USER_LOGIN_USE_VC 
		); // 是否需要验证码
		
		$auth = new session_userAuth ( $this->session );
		identityToken::getInstance ()->setInfo ( $auth->getInfo () );
		identityToken::getInstance ()->setRoleCode ( $auth->getRoleCode () );
		$role = array (
				"guest" => "Guest",
				"member" => "Member" 
		);
		if (! array_key_exists ( identityToken::getInstance ()->getRoleCode (), $role )) {
			identityToken::getInstance ()->setRoleCode ( "guest" );
		}
		return $this;
	}
	public function getRemainTryTimes() {
		return $this->conf ["u_try_times_max"] - $this->getOpFailCnt ();
	}
	private function _checkVc($code) {
		if ($this->conf ["open"]) {
			// 检查是否需要验证码
			$failCnt = $this->getOpFailCnt ();
			if ($failCnt > $this->conf ["u_try_times"]) {
				$helper = new session_captcha ( $this->session );
				return $helper->check ( $code );
			}
			return true;
		}
		return true;
	}
	
	/**
	 * 检查这个IP今天是否允许登陆
	 *
	 * @return boolean
	 */
	public function chkLoginPermit() {
		$this->remain_times = $this->getRemainTryTimes ();
		if ($this->remain_times <= 0) {
			return false;
		}
		return true;
	}
	
	/**
	 *
	 * @param string $nep
	 *        	name/email/phone
	 * @param unknown $pwd        	
	 * @param string $code        	
	 * @return rirResult
	 */
	public function check($nep, $pwd, $code = "") {
		if (! $this->chkLoginPermit ()) {
			return new rirResult ( 1, "密码错误次数过多" );
		}
		$this->opStart ();
		if (! $this->_checkVc ( $code )) {
			$this->opUpdate ();
			return new rirResult ( 2, "验证码错误" );
		}
		$pwd = userFilter::filterPwd ( $pwd );
		if (validator::isEmail ( $nep )) {
			$sql = $this->sqlManager->getSql ( "/ui_user/row_eml_pwd" );
			$ret = $this->db->fetch ( $sql, array (
					"email" => $nep,
					"pwd" => $pwd 
			) );
		} else if (userValidator::isValidPhone ( $nep )) {
			$sql = $this->sqlManager->getSql ( "/ui_user/row_phone_pwd" );
			$ret = $this->db->fetch ( $sql, array (
					"phone" => $nep,
					"pwd" => $pwd 
			) );
		} else {
			$sql = $this->sqlManager->getSql ( "/ui_user/row_name_pwd" );
			$ret = $this->db->fetch ( $sql, array (
					"name" => $nep,
					"pwd" => $pwd 
			) );
		}
		if (empty ( $ret )) {
			$this->opUpdate ();
			return new rirResult ( 3, "用户名密码不匹配" );
		}
		return $this->_saveInfo ( $ret );
	}
	/**
	 * 获取下次密码验证时是否需要验证码
	 * 返回真需要验证码
	 *
	 * @return bool
	 */
	public function getVcFlag() {
		return $this->getOpFailCnt () > $this->conf ["u_try_times"];
	}
	private function _saveInfo($ret) {
		$auth = new session_userAuth ( $this->session );
		$info = $this->row ( $ret ["sid"] );
		$auth->saveInfo ( $info );
		$auth->saveRoleCode ( session_userAuth::$roleCode );
		identityToken::getInstance ()->setInfo ( $info );
		identityToken::getInstance ()->setRoleCode ( session_userAuth::$roleCode );
		return new rirResult ( 0, "登陆成功", $info );
	}
	public function getOpType() {
		return "user_auth";
	}
	public function opStart() {
		$this->oplog = new oplog ();
		$this->opsid = $this->oplog->add ( $this->getOpType (), identityToken::getInstance ()->getIp () );
	}
	public function opUpdate() {
		if ($this->opsid) {
			$this->oplog->update ( $this->opsid );
		}
	}
	public function getOpFailCnt() {
		$priv = new oplog ();
		return $priv->getCnt ( $this->getOpType (), identityToken::getInstance ()->getIp () );
	}
}
class session_userAuth {
	/**
	 *
	 * @var session
	 */
	private $session;
	private $session_key = "user_usr_auth_info";
	private $session_key_rc = "user_usr_auth_rolecode";
	public static $roleCode = "member";
	public function __construct(session $session) {
		$this->session = $session;
	}
	public function saveInfo($info) {
		$this->session->add ( $this->session_key, $info );
	}
	public function saveRoleCode($rc) {
		$this->session->add ( $this->session_key_rc, $rc );
	}
	public function getRoleCode() {
		return $this->session->get ( $this->session_key_rc );
	}
	public function isLogined() {
		return $this->session->get ( $this->session_key_rc ) == session_userAuth::$roleCode;
	}
	public function getInfo() {
		return $this->session->get ( $this->session_key );
	}
	public function logout() {
		$this->session->remove ( $this->session_key );
		$this->session->remove ( $this->session_key_rc );
		return true;
	}
}