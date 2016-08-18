<?php
/**
 * 前台TPL文件调用添加问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/IOp.php";
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/oplog.php";
require_once FILE_SYSTEM_ENTRY . "/modules/captcha/captcha.php";

require_once FILE_SYSTEM_ENTRY . "/app/data/_meta/avatarMeta.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/priv/ask/askValidator.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/priv/user/userFilter.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/priv/user/userValidator.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/priv/appraise/appraiseValidator.php";
class putUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array ();
	private function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/default/ui_put.xml" );
	}
	
	/**
	 *
	 * @return putUIApi
	 */
	public static function getInstance() {
		if (is_null ( putUIApi::$inst )) {
			putUIApi::$inst = new putUIApi ();
		}
		return putUIApi::$inst;
	}
	
	/**
	 *
	 * @param int $did        	
	 * @param int $uid        	
	 * @param int $dod        	
	 * @param string $title        	
	 * @param string $desc        	
	 * @param string $svr        	
	 * @return 数字 大于 0 正常，0数据库错误，负数见代码
	 */
	public function addAsk($uid, $dod, $title, $did, $desc, $svr, $date) {
		$op_type = "user_submit";
		$op_id = $uid;
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $op_id );
		if (USER_SUBMIT_TRY_MAX - $try_cnt <= 0) {
			return - 9;
		}
		$opsid = $oplog->add ( $op_type, $op_id );
		$oplog->update ( $opsid );
		
		if (utility::utf8Strlen ( $desc ) > 2048) {
			return - 10;
		}
		if (utility::utf8Strlen ( $svr ) > 2048) {
			return - 11;
		}
		// validate data
		if (! validator::isUint ( $uid )) {
			return - 1;
		}
		if (! validator::isUint ( $dod )) {
			return - 2;
		}
		if (! askValidator::isValidTitle ( $title )) {
			return - 3;
		}
		if (! validator::isUint ( $did )) {
			return - 4;
		}
		if (! askValidator::isValidDesc ( $desc )) {
			return - 5;
		}
		if (! askValidator::isValidSvr ( $svr )) {
			return - 6;
		}
		if (! askValidator::isValidFiles ( $files )) {
			return - 7;
		}
		if (! validator::isDateTime ( $date )) {
			return - 8;
		}
		$sql = $this->sqlManager->getSql ( "/ui_put/add" );
		$bnd = array (
				"uid" => $uid,
				"dod" => $dod,
				"title" => $title,
				"did" => $did,
				"desc" => $desc,
				"svr" => $svr,
				"date" => $date 
		);
		
		$sid = $this->db->insert ( $sql, $bind );
		
		return $sid;
	}
	
	/**
	 *
	 * @param int $uid        	
	 * @param string $op
	 *        	旧密码
	 * @param string $np
	 *        	新密码
	 * @return rirResult
	 */
	public function modpwd($uid, $op, $np) {
		$op_type = "user_modify";
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $uid );
		if (USER_MOD_PROFILE_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天编辑次数过多" );
		}
		$opsid = $oplog->add ( $op_type, $uid );
		$oplog->update ( $opsid );
		
		$sql = $this->sqlManager->getSql ( "/ui_put/profile/pwd" );
		$row = $this->db->exec ( $sql, array (
				"uid" => $uid,
				"oldpwd" => Security::encrypt ( $op ),
				"newpwd" => Security::encrypt ( $np ) 
		) );
		if ($row == 1) {
			return new rirResult ( 0, "ok" );
		}
		return new rirResult ( 2, "原密码错误 或 与新密码相同" );
	}
	
	/**
	 *
	 * @param string $name        	
	 * @param string $pwd        	
	 * @param string $sq        	
	 * @param string $sa        	
	 * @param string $eml        	
	 * @param string $code        	
	 * @return rirResult
	 */
	public function register_normal($name, $pwd, $sq, $sa, $eml, $code) {
		// 23000
		// string(5) "23000" string(37) "Duplicate entry 'awei' for key 'name'"
		$op_type = "user_register";
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, identityToken::getInstance ()->getIp () );
		if (USER_REGIST_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "您所在的IP今天注册次数过多。" );
		}
		$opsid = $oplog->add ( $op_type, identityToken::getInstance ()->getIp () );
		
		$captcha = new session_captcha ( new session () );
		if (! $captcha->check ( $code )) {
			return new rirResult ( 2, "验证码校验失败" );
		}
		
		// 开始校验提交数据
		if ($name == "" || strlen ( $name ) > 64) {
			return new rirResult ( 3, "用户为空或者长度大于64" );
		}
		// 防止前台忘记转义
		if (strpos ( $name, "<" ) !== false) {
			return new rirResult ( 0xb, "用户含有非法字符" );
		}
		if ($pwd == "" || strlen ( $pwd ) < 3) {
			return new rirResult ( 4, "密码为空或者长度小于3" );
		}
		if ($sq == "" || strlen ( $sq ) > 64) {
			return new rirResult ( 5, "密码安全问题为空或者长度大于64" );
		}
		if ($sa == "" || strlen ( $sa ) > 64) {
			return new rirResult ( 6, "密码安全答案为空或者长度大于64" );
		}
		
		if ($eml) {
			if (! validator::isEmail ( $eml ) || ! strlen ( $eml )) {
				return new rirResult ( 7, "EMAIL格式不正确或者长度大于64" );
			}
			$sql = $this->sqlManager->getSql ( "/ui_put/reg_normal" );
			$bnd = array (
					"email" => $eml,
					"name" => $name,
					"pwd" => Security::encrypt ( $pwd ),
					"rpq" => $sq,
					"rpa" => $sa 
			);
		} else {
			$sql = $this->sqlManager->getSql ( "/ui_put/reg_normal_noeml" );
			$bnd = array (
					"name" => $name,
					"pwd" => Security::encrypt ( $pwd ),
					"rpq" => $sq,
					"rpa" => $sa 
			);
		}
		// var_dump($sql,$bnd);exit;
		$ret = $this->db->exec ( $sql, $bnd );
		if ($ret == 0) {
			$info = $this->db->getErrorInfo ();
			if ($this->db->getErrorCode () == "23000") {
				// 索引唯一约束
				if (preg_match ( "/for key '(name|email|phone)'$/", $info, $matches )) {
					if ($matches [1] == "name") {
						return new rirResult ( 8, "用户名已存在" );
					} else {
						return new rirResult ( 0x9, "EMAIL已存在" );
					}
				}
			}
			return new rirResult ( 0xa, $info );
		}
		$oplog->update ( $opsid );
		return new rirResult ( 0, "注册成功", $ret );
	}
	
	/**
	 *
	 * @param string $nep        	
	 * @param string $sq
	 *        	问题
	 * @param string $sa
	 *        	回答
	 * @param string $pwd
	 *        	新密码
	 * @return rirResult
	 */
	public function resetPwd($nep, $sq, $sa, $pwd) {
		$op_type = "user_reset_pwd";
		$op_id = identityToken::getInstance ()->getIp ();
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $op_id );
		if (USER_RESET_PWD_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天找回密码功能使用次数过多" );
		}
		$opsid = $oplog->add ( $op_type, $op_id );
		$oplog->update ( $opsid );
		
		if (validator::isEmail ( $nep )) {
			$sql = $this->sqlManager->getSql ( "/ui_put/reset_pwd/email" );
			$bnd = array (
					"email" => $nep,
					"rpq" => $sq,
					"rpa" => $sa,
					"pwd" => Security::encrypt ( $pwd ) 
			);
		} else if (userValidator::isValidPhone ( $nep )) {
			$sql = $this->sqlManager->getSql ( "/ui_put/reset_pwd/phone" );
			$bnd = array (
					"phone" => $nep,
					"rpq" => $sq,
					"rpa" => $sa,
					"pwd" => Security::encrypt ( $pwd ) 
			);
		} else {
			$sql = $this->sqlManager->getSql ( "/ui_put/reset_pwd/name" );
			$bnd = array (
					"name" => $nep,
					"rpq" => $sq,
					"rpa" => $sa,
					"pwd" => Security::encrypt ( $pwd ) 
			);
		}
		// var_dump($sql,$bnd);exit;
		$row = $this->db->exec ( $sql, $bnd );
		if ($row == 1) {
			return new rirResult ( 0, "密码已重置" );
		}
		return new rirResult ( 2, "密码问题和答案不匹配 或者 您新输入的密码与原来的密码一至" );
	}
	
	/**
	 *
	 * @param int $uid        	
	 * @param string $name        	
	 * @param string $sq        	
	 * @param string $sa        	
	 * @param string $eml        	
	 * @param string $phone        	
	 * @return rirResult
	 */
	public function modProfile($uid, $name, $eml, $phone, $sq, $sa) {
		// 23000
		// string(5) "23000" string(37) "Duplicate entry 'awei' for key 'name'"
		$op_type = "user_modify";
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $uid );
		if (USER_MOD_PROFILE_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天编辑次数过多" );
		}
		$opsid = $oplog->add ( $op_type, $uid );
		$oplog->update ( $opsid );
		
		// 开始校验提交数据
		if ($name == "" || strlen ( $name ) > 64) {
			return new rirResult ( 3, "用户为空或者长度大于64" );
		}
		// 防止前台忘记转义
		if (strpos ( $name, "<" ) !== false) {
			return new rirResult ( 0xb, "用户含有非法字符" );
		}
		if ($sq == "" || strlen ( $sq ) > 64) {
			return new rirResult ( 5, "密码安全问题为空或者长度大于64" );
		}
		if ($sa == "" || strlen ( $sa ) > 64) {
			return new rirResult ( 6, "密码安全答案为空或者长度大于64" );
		}
		$nep = "";
		$bnd = array ();
		if ($eml) {
			if (! validator::isEmail ( $eml ) || strlen ( $eml ) > 64) {
				return new rirResult ( 7, "EMAIL格式不正确或者长度大于64" );
			}
			
			$nep .= "`email` = :email,";
			$bnd ["email"] = $eml;
		}
		
		if ($phone) {
			if (! userValidator::isValidPhone ( $phone )) {
				return new rirResult ( 8, "手机号码格式不对" );
			}
			// `phone` = :phone,
			$nep .= "`phone` = :phone,";
			$bnd ["phone"] = $phone;
		}
		$sql = strtr ( $this->sqlManager->getSql ( "/ui_put/profile/base" ), array (
				"@nep" => $nep 
		) );
		// exit($sql);
		$bnd ["name"] = $name;
		$bnd ["rpq"] = $sq;
		$bnd ["rpa"] = $sa;
		$bnd ["uid"] = $uid;
		
		$ret = $this->db->exec ( $sql, $bnd );
		if ($ret == 0) {
			if ($this->db->getErrorCode () == "23000") {
				// 索引唯一约束
				$info = $this->db->getErrorInfo ();
				if (preg_match ( "/for key '(name|email|phone)'$/", $info, $matches )) {
					if ($matches [1] == "name") {
						return new rirResult ( 8, "用户名已存在" );
					} else if ($matches [1] == "phone") {
						return new rirResult ( 0x9, "手机号码已存在" );
					} else {
						return new rirResult ( 0xe, "EMAIL已存在" );
					}
				}
			}
			return new rirResult ( 0xa, $info );
		}
		$sql = $this->sqlManager->getSql ( "/ui_put/row_uid" );
		$ret = $this->db->fetch ( $sql, array (
				"uid" => $uid 
		) );
		return new rirResult ( 0, "更新成功", $ret );
	}
	
	/**
	 *
	 * @param int $uid        	
	 * @param int $dod        	
	 * @param string $content        	
	 * @return rirResult
	 */
	public function addComment($uid, $aid, $content) {
		$op_type = "user_submit";
		$op_id = $uid;
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $op_id );
		if (USER_SUBMIT_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天向网站提交的数据过多" );
		}
		$opsid = $oplog->add ( $op_type, $op_id );
		$oplog->update ( $opsid );
		
		if (utility::utf8Strlen ( $content ) > 2048) {
			return new rirResult ( 2, "内容过长" );
		}
		$sql = $this->sqlManager->getSql ( "/ui_put/add" );
		$bnd = array (
				"uid" => $uid,
				"aid" => $aid,
				"comment" => $content 
		);
		// var_dump($sql,$bnd);exit;
		$row = $this->db->insert ( $sql, $bnd );
		if ($row > 0) {
			return new rirResult ( 0, "提交成功，审核通过后会出现在页面上" );
		}
		return new rirResult ( 0, $this->db->getErrorInfo () );
	}
	
	/**
	 *
	 * @param int $uid        	
	 * @param int $dod        	
	 * @param string $content        	
	 * @return rirResult
	 */
	public function addAppraise($uid, $did, $dod, $lv, $txt) {
		$op_type = "user_submit";
		$op_id = $uid;
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $op_id );
		if (USER_SUBMIT_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天向网站提交的数据过多" );
		}
		$opsid = $oplog->add ( $op_type, $op_id );
		$oplog->update ( $opsid );
		
		// validate data
		if (! validator::isDate ( $date )) {
			return new rirResult ( 1, "invalid date" );
		}
		if (! validator::isUint ( $uid )) {
			return new rirResult ( 2, "invalid uid" );
		}
		if (! validator::isUint ( $dod )) {
			return new rirResult ( 3, "invalid dod" );
		}
		if (! validator::isUint ( $did )) {
			return new rirResult ( 4, "invalid did" );
		}
		if (! validator::isUint ( $lv )) {
			return new rirResult ( 5, "invalid appraise" );
		}
		if (! appraiseValidator::isValidContent ( $txt )) {
			return new rirResult ( 6, "invalid content" );
		}
		
		$sql = $this->sqlManager->getSql ( "/ui_put/appraise" );
		$bind = array (
				"uid" => $uid,
				"did" => $did,
				"dod" => $dod,
				"txt" => $txt,
				"lv" => $lv,
				"date" => date ( "Y-m-d", time () ) 
		);
		$sid = $this->db->insert ( $sql, $bind );
		if ($sid > 0) {
			return new rirResult ( 0, "提交成功，审核通过后会出现在页面上" );
		}
		return new rirResult ( 0, $this->db->getErrorInfo () );
	}
	
	/**
	 *
	 * @param int $uid        	
	 * @param int $dod        	
	 * @param string $content        	
	 * @return rirResult
	 */
	public function addLetter($uid, $dod, $content) {
		$op_type = "user_submit";
		$op_id = $uid;
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $op_id );
		if (USER_SUBMIT_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天向网站提交的数据过多" );
		}
		$opsid = $oplog->add ( $op_type, $op_id );
		$oplog->update ( $opsid );
		
		if (utility::utf8Strlen ( $content ) > 2048) {
			return new rirResult ( 2, "内容过长" );
		}
		$sql = $this->sqlManager->getSql ( "/ui_put/letter" );
		$bnd = array (
				"uid" => $uid,
				"dod" => $dod,
				"content" => $content 
		);
		// var_dump($sql,$bnd);exit;
		$row = $this->db->insert ( $sql, $bnd );
		if ($row > 0) {
			return new rirResult ( 0, "提交成功，审核通过后会出现在页面上" );
		}
		return new rirResult ( 0, $this->db->getErrorInfo () );
	}
	
	/**
	 *
	 * @param int $led        	
	 * @param int $uid
	 *        	删除感谢信
	 * @return int 1/0
	 */
	public function rmLetter($uid, $led) {
		$sql = $this->sqlManager->getSql ( "/ui_put/rm" );
		$bnd = array (
				"uid" => $uid,
				"led" => $led 
		);
		return $this->db->exec ( $sql, $bnd );
	}
}
