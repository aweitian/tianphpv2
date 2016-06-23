<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/modules/priv/priv.php";
class privController extends Controller{
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
	
	/**
	 * 
	 * @var priv
	 */
	protected $priv;
	
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $identityToken){
		privController::$msg = $msg;
		privController::$identityToken = $identityToken;
		return parent::_checkPrivilege($msg, $identityToken);
	}
	
	protected function initHttpResponse(){
		$this->response = new httpResponse();
	}
	protected function checkPriv(){
		$this->priv = new priv(App::getSession());
		if(!$this->priv->isLogined()){
			$request = new httpRequest();
			$url = $request->requestUri();
			$ret = "?redirect=".urlencode($url);
			$this->response = new httpResponse();
			$this->response->go("/priv/login".$ret);
		}
	}
	protected function chkPost(pmcaiMsg $msg,$data){
		foreach ($data as $k){
			if(!isset($msg[$k])){
				var_dump($msg->getPostData());
				$this->response->showError("提交的参数不全:".$k);
			}
		}
	}
	protected function chkGet(pmcaiMsg $msg,$data){
		foreach ($data as $k){
			if(!isset($msg["?".$k])){
				var_dump($msg->getPostData());
				$this->response->showError("提交的参数不全:".$k);
			}
		}
	}
}