<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/modules/captcha/captcha.php";
class captchaController implements IController{
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $identityToken){
		return true;
	}

	public function welcomeAction(){
		$c = new session_captcha(App::getSession());
		$c->getCode_char(6, 64, 23);
	}
}