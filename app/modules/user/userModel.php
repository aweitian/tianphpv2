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
		$this->session = AppUser::getInstance()->session;
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
	 * 返回真表示正常
	 * @return boolean
	 */
	public function chkLoginPermit(){
		return userUIApi::getInstance()->initLogin($this->session)->chkLoginPermit();
	}
	
	/**
	 * 获取是否需要验证码
	 * @return boolean
	 */
	public function getVcFlag() {
		return userUIApi::getInstance ()->initLogin ( $this->session )->getVcFlag ();
	}
	public function register_normal($name, $pwd, $sq, $sa, $eml, $code) {
		return userUIApi::getInstance ()->register_normal ( $name, $pwd, $sq, $sa, $eml, $code );
	}
}