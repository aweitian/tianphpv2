<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/lib/db/mysql/mysqlPdoBase.php";
require_once FILE_SYSTEM_ENTRY."/modules/priv/priv.php";
class privController extends Controller{
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
}