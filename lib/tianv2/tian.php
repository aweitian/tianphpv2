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

set_include_path(ENTRY_PATH.PATH_SEPARATOR.get_include_path());
require_once 'lib/tianv2/request/httpRequest.php';
require_once 'lib/tianv2/response/httpResponse.php';
require_once 'lib/tianv2/route/router.php';
require_once 'lib/tianv2/identityToken/identityToken.php';

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
	 * @var router
	 */
	public static $router;
	
	/**
	 * @var IDispatcher
	 */
	public static $dispatcher;
	/**
	 * @var message
	 */
	public static $message;
	
	
	
	public static $identityToken;
	
	/**
	 * 
	 * @var PDO
	 */
	public static $pdo;
	/**
	 * @var IDbInfo
	 */
	public static $dbInfo;
	/**
	 * @var ITableInfo
	 */
	public static $tableInfo;
	/**
	 * 
	 * @var IColumnInfo
	 */
	public static $columnInfo;
	
	/**
	 * @var IPdoBase
	 */
	public static $pdoBase;
	
	
	private static $modulePath = array();
	private function __construct(){}
	
	public static function throwException($err_no){
		static $e;
		if(!is_array($e)){
			$dir = ENTRY_PATH.'/lib/tianv2/exceptions';
			$list = self::getFileList($dir,"php");
			$e = array();
			foreach ($list as $item){
				$e = $e + require_once $item;
			}
		}
		print "<pre>";
		throw new Exception($e[$err_no],$err_no);
	}
	
	public static function initIdentityEoken(){
		self::$identityToken = new identityToken(self::getClientIp());
	}
	public static function initHttpRequest(){
		self::$requiest = new httpRequest();
	}
	public static function initHttpResponse(){
		self::$response = new httpResponse();
	}
	public static function addModulePath($name,$path){
		self::$modulePath[$name] = $path;
	}
	public static function removeModulePath($name){
		unset(self::$modulePath[$name]);
	}
	public static function initRouter(){
		self::$router = new router();
	}
	public static function initDefDispatcher(){
		require_once 'lib/tianv2/route/routes/default/defaultDispatcher.php';
		self::$dispatcher = new defaultDispatcher(self::$router->getRoute()->msg);
	}
	public static function getModulePath($name){
		if(!isset(self::$modulePath[$name])){
			tian::throwException("7396");
			return ;
		}
		return self::$modulePath[$name];
	}
	public static function getDirList($dir){
		$ret=array();
		if(!$handle = @opendir($dir)){
			return false;
		}
		while (false !== ($file = @readdir($handle))) {
			if($file==".")continue;
			if($file=="..")continue;
			$p = $dir.DIRECTORY_SEPARATOR.$file;
			if (is_dir($p)){
				$ret[]=$file;
			}
		}
		return $ret;
	}
	/**
	 *
	 * 获取目录下所有孩子文件全路径,后台的参数大小写不区分
	 * @param $dir
	 * @param $ext_filter 排除前面用!txt,ini.
	 */
	public static function getFileList($dir,$ext_filter=""){
		$ret=array();
		if(!$handle = @opendir($dir)){
			return false;
		}
		$filter=array();
		$filter_mode="include";
		if(is_string($ext_filter) && $ext_filter!=""){
			if(substr($ext_filter, 0,1)=="!"){
				$filter_mode="exclude";
				$filter=substr($ext_filter, 1);
			}else{
				$filter=explode(",", $ext_filter);
			}
		}
		while (false !== ($file = @readdir($handle))) {
			if($file==".")continue;
			if($file=="..")continue;
			$p = $dir.DIRECTORY_SEPARATOR.$file;
			$path = $p;
			if (is_file($p)){
				if($filter!=""){
					$p=explode(".", $file);
					if(is_array($p)){
						if($filter_mode=="include"){
							foreach ($filter as $f){
								if(strtolower(end($p))==strtolower($f))$ret[] = $path;
							}
						}else{
							foreach ($filter as $f){
								if(strtolower(end($p))!=strtolower($f))$ret[] = $path;
							}
						}
					}
				}else{
					$ret[] = $path;
				}
	
			}
		}
		return $ret;
	}
	public static function getClientIp(){
		$ip = $_SERVER["REMOTE_ADDR"];
		if(substr($ip,0,7) === "192.168"){
			$ip = getenv("HTTP_X_Forwarded_For");
			if(strpos($ip, ",") !== false){
				$ips = explode(",",$ip);
				$ip = $ips[sizeof($ips)-1];
			}
		}
		return($ip);
	}
	public static function getDefPreMask(){
		if(ENTRY_HOME == "" )return "";
		return str_repeat("p", count(explode("/", trim(ENTRY_HOME,"/"))));
	}


	/* db */
	/**
	 * @return mysqlPdoBase
	 */
	public static function initPdoBase(){
		require_once 'lib/tianv2/db/mysql/mysqlPdoBase.php';
		self::$pdo = new PDO('mysql:host=localhost;dbname='.DB_NAME,DB_USER,DB_PASS);
		self::$pdoBase = new mysqlPdoBase();
	}
	/**
	 * @return mysqlDbInfo
	*/
	public static function initDbInfo(){
		require_once 'lib/tianv2/db/mysql/mysqlDbInfo.php';
		self::$dbInfo = new mysqlDbInfo(DB_NAME);
	}
	/**
	 * @return mysqlTableInfo
	*/
	public static function getTableInfo($tabname){
		require_once 'lib/tianv2/db/mysql/mysqlTableInfo.php';
		return new mysqlTableInfo($tabname);
	}
	/**
	 * @return mysqlColumnInfo
	*/
	public static function getColumnInfo($tabname, $columnname){
		require_once 'lib/tianv2/db/mysql/mysqlColumnInfo.php';
		return new mysqlColumnInfo($tabname, $columnname);
	}


}