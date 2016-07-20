<?php
class userModel extends AppModel {
	/**
	 *
	 * @var session
	 */
	public $session;
	public function __construct() {
	}
	public function initSession() {
		$this->session = AppUser::getInstance ()->session;
	}
	/**
	 *
	 * @param string $nep        	
	 * @param string $pwd        	
	 * @param string $code        	
	 * @return rirResult
	 */
	public function chk($nep, $pwd, $code = "") {
		return userUIApi::getInstance ()->initLogin ( $this->session )->check ( $nep, $pwd, $code );
	}
	
	/**
	 * 修改头像
	 * 
	 * @param int $uid        	
	 * @param string $a        	
	 * @return rirResult
	 */
	public function avatar($uid, $a) {
		return userUIApi::getInstance ()->avatar ( $uid, $a );
	}
	/**
	 * 修改密码
	 * 
	 * @param int $uid        	
	 * @param string $op        	
	 * @param string $np        	
	 * @return rirResult
	 */
	public function modpwd($uid, $op, $np) {
		return userUIApi::getInstance ()->modpwd ( $uid, $op, $np );
	}
	public function resetPwd($nep, $sq, $sa, $pwd) {
		return userUIApi::getInstance ()->resetPwd ( $nep, $sq, $sa, $pwd );
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
		return userUIApi::getInstance ()->modProfile ( $uid, $name, $eml, $phone, $sq, $sa );
	}
	
	/**
	 * 返回真表示正常
	 * 
	 * @return boolean
	 */
	public function chkLoginPermit() {
		return userUIApi::getInstance ()->initLogin ( $this->session )->chkLoginPermit ();
	}
	
	/**
	 * 获取是否需要验证码
	 * 
	 * @return boolean
	 */
	public function getVcFlag() {
		return userUIApi::getInstance ()->initLogin ( $this->session )->getVcFlag ();
	}
	public function register_normal($name, $pwd, $sq, $sa, $eml, $code) {
		return userUIApi::getInstance ()->register_normal ( $name, $pwd, $sq, $sa, $eml, $code );
	}
}