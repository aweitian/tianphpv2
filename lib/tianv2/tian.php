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
define("ENTRY_HOME","/tianphpv2");
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
	 * @var urlManager
	 */
	public static $urlManager;
	/**
	 * @var message
	 */
	public static $message;
	private function __construct(){}
	
	public static function throwException($err_no){
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
	public static function initUrlManager(){
		if(is_null(self::$requiest)){
			self::throwException("7392");
			return;
		}
		if(is_null(self::$response)){
			self::throwException("7393");
			return;
		}
		self::$urlManager = new urlManager();
	}
	public static function initMsg(){
		
		//self::$message = new message(self::$requiest, $urlManager)
	}
}