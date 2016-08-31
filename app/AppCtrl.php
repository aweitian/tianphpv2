<?php
abstract class appCtrl implements IController {
	/**
	 * 
	 * @var pmcaiMsg
	 */
	public static $msg;
	/**
	 * 
	 * @var identityToken
	 */
	public static $identityToken;
	
	/**
	 *
	 * @var httpResponse
	 */
	protected $response;
	protected function initHttpResponse(){
		$this->response = new httpResponse();
	}
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $identityToken){
		appCtrl::$msg = $msg;
		appCtrl::$identityToken = $identityToken;
		return true;
	}
}