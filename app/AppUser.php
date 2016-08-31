<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月19日
 * @Desc: 用户登陆管理
 * 依赖:
 */
class AppUser {
	private static $inst = null;
	/**
	 *
	 * @var session
	 */
	public $session;
	/**
	 * 
	 * @var session_userAuth
	 */
	public $auth;
	private function __construct() {
		$this->session = new session ();
		$this->auth = new session_userAuth ( $this->session );
// 		var_dump($this->auth->isLogined());	exit;
	}
	
	/**
	 *
	 * @return AppUser
	 */
	public static function getInstance() {
		if (is_null ( AppUser::$inst )) {
			AppUser::$inst = new AppUser ();
		}
		return AppUser::$inst;
	}
}