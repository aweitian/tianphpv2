<?php
class userModel extends AppModel {
	public function __construct() {
	}
	/**
	 * 
	 * @param string $nep
	 * @param string $pwd
	 * @param string $code
	 * @return rirResult
	 */
	public function login(userController $ctr,$nep, $pwd, $code = "") {
		return userUIApi::getInstance()->initLogin($ctr->sesion)->check($nep, $pwd,$code);
	}
}