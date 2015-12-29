<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class App{
	public static $envir;
	/**
	 * 
	 * @var IPdoBase
	 */
	public static $db;
	/**
	 * 
	 * @var PDO
	 */
	public static $pdo;
	private function __construct(){
		
		
	}
	/**
	 * @return envir string
	 */
	public static function probe(){
		
	}
	/**
	 * 
	 * 1. 环境名初始化
	 * 2. 初始化IdentityEoken
	 * 3. RunEnvir
	 * 4. HttpRequest
	 * 5. HttpResponse
	 * 6. initRouter
	 */
	public static function init(){
		if(false !== strpos(FILESYSTEM_ENTRY_POINT, "openshift")){
			self::initEnvir("openshift");
		}else{
			self::initEnvir("default");
		}
		tian::initIdentityEoken();
		tian::initHttpRequest();
		tian::initHttpResponse();
		tian::initRouter();
		
		tian::initPdoBase();
		tian::initDbInfo();
		
		
		require_once 'app/routes/svc/svcRoute.php';
		require_once 'app/routes/svc/svcDispatcher.php';
		
		self::$db = tian::$pdoBase;
		self::$pdo = tian::$pdo;
		
	}
	public static function run(){
		
		tian::addModulePath("default", FILESYSTEM_ENTRY_POINT."/app/controls");
		tian::$router->addRoute("svc", new svcRoute());
		
		tian::$router->addDefaultRoutes();
		tian::$router->route();
		$routeName = tian::$router->getMatchedRouteName();
		switch ($routeName){
			case "default":
				tian::initDefDispatcher();
				tian::$dispatcher->dispatch();
// 				tian::$dispatcher->debug();
				break;
			case "svc":
				tian::$dispatcher = new svcDispatcher();
				tian::$dispatcher->dispatch();
				break;
		}
	}
	private static function initEnvir($envir){
		self::$envir = $envir;
		switch ($envir){
			case "openshift":
				require_once 'app/runEnvir/openshift.php';
				break;
			default:
				require_once 'app/runEnvir/default.php';
				break;
		}
	}
	/**
	 * @return IPdoBase
	 */
	public static function getPdoBase(){
		return tian::$pdoBase;
	}
	/**
	 * @return IDbInfo
	 */
	public static function getDbInfo(){
		return tian::$dbInfo;
	}
	/**
	 * @return ITableInfo
	 */
	public static function getTableInfo($tabname){
		return tian::getTableInfo($tabname);
	}
	/**
	 * @return IColumnInfo
	 */
	public static function getColumnInfo($tabname, $columnname){
		return tian::getColumnInfo($tabname, $columnname);
	}
}