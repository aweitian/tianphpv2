<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
define("DEBUG_FLAG", TRUE);
if(DEBUG_FLAG){
	error_reporting(E_ALL);
	ini_set("display_errors","On");
}else{
	error_reporting(0);
	ini_set("display_errors","Off");
}

define("ENTRY_PATH",dirname(dirname(dirname(__FILE__))));
define("ENTRY_HOME","/ep");
set_include_path(ENTRY_PATH.PATH_SEPARATOR.get_include_path());

class tian{
	/**
	 * @var runEnvir
	 */
	public static $runEnvir;
	/**
	 * @var httpRequest
	 */
	public static $requiest;
	/**
	 * @var httpResponse
	 */
	public static $response;
	/**
	 * @var message
	 */
	public static $message;
	private function __construct(){}
	
	public static function throwExctpion($err_no){
		static $e;
		if(!is_array($e)){
			$e = require_once 'lib/tianv2/exceptions/exceptions.php';
		}
		throw new Exception($err_no,$e[$err_no]);
	}
	public static function initRunEnvir(){
		self::$runEnvir = runEnvirFactory::getInstance()->runEnvir;
	}
	public static function initHttpRequest(){
		self::$requiest = new httpRequest();
	}
	public static function initHttpResponse(){
		self::$response = new httpResponse();
	}
	public static function initMsg(){
		
	}
}