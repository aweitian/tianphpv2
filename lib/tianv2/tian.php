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
	
	/**
	 * 
	 * @var session
	 */
	public static $session;
	
	private static $modulePath = array();
	
	private static $e;
	private function __construct(){}
	
	public static function throwException($err_no,$placeHolder=array()){
		if(!is_array(tian::$e)){
			$dir = ENTRY_PATH.'/lib/tianv2/exceptions';
			$list = self::getFileList($dir,"php");
			tian::$e = array();
			foreach ($list as $item){
				tian::addException($item);
			}
		}
		self::newException($e[$err_no],$err_no,$placeHolder);
	}
	public static function newException($msg,$no,$placeHolder=array()) {
		print "<pre>";
		$replacement = array();
		foreach ($placeHolder as $key => $val) {
			$replacement[":".$key] = $val;
		}
		if (count($replacement)) {
			$msg = strtr($msg,$replacement);
		}
		throw new Exception($msg,$no);
	}
	/**
	 * 
	 * @param string $path
	 * @return bool
	 */
	public static function addException($path){
		static $loaded_files = array();
		$p = realpath($path);
		if ($p) {
			$md5 = md5($p);
			if (!array_key_exists($md5,$loaded_files)) {
				$loaded_files[$md5] = $p;
				tian::$e = tian::$e + require_once $p;
				return true;
			}
		}
		return false;
	}
	public static function init() {
		require_once 'lib/tianv2/validate/validator.php';
		tian::loadInterfaces();
		tian::initSession();
		tian::initIdentityToken();
		tian::initHttpRequest();
		tian::initHttpResponse();
		tian::initRouter();
		
		tian::initPdoBase();
		tian::initDbInfo();
		
	}
	private static function loadInterfaces() {
		return self::loadLibs("lib/tianv2/interfaces");
	}
	public static function loadLibs($dir) {
		$ls = tian::getALLFileList($dir,"php");
		foreach($ls as $f) {
			require_once $f;
		}
		return ;
	}
	public static function initIdentityToken(){
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
			return $ret;
		}
		while (false !== ($file = @readdir($handle))) {
			if($file==".")continue;
			if($file=="..")continue;
			$p = $dir.DIRECTORY_SEPARATOR.$file;
			if (is_dir($p)){
				$ret[]=$file;
			}
		}
		@closedir($handle);
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
			return $ret;
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
		@closedir($handle);
		return $ret;
	}
	/**
	 *
	 * 获取目录下所有文件全路径,后台的参数大小写不区分
	 * @param $dir
	 * @param $ext_filter 排除前面用!txt,ini.
	 */
	public static function getALLFileList($dir,$ext_filter="",&$ret=array()){
		$dirArr = self::getDirList($dir);
		
// 		var_dump($ret);
		foreach ($dirArr as $d) {
			self::getALLFileList($dir.DIRECTORY_SEPARATOR.$d,$ext_filter,$ret);
		}
		$ret = array_merge($ret , self::getFileList($dir,$ext_filter));
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
	public static function initSession() {
		require_once "lib/tianv2/session/session.php";
		self::$session = new session();
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