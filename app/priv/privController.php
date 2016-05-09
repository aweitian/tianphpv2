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
	
	protected function initHttpResponse(){
		$this->response = new httpResponse();
	}
}