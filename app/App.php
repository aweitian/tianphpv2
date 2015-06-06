<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class App{
	public static $envir;
	private function __construct(){
		
	}
	public static function init($envir){
		self::initEnvir($envir);
		tian::initIdentityEoken();
		tian::initRunEnvir();
		tian::initHttpRequest();
		tian::initHttpResponse();
		tian::initRouter();
		
		require_once 'app/routes/svc/svcRoute.php';
		require_once 'app/routes/svc/svcDispatcher.php';
	}
	public static function run(){
		tian::addModulePath("default", ENTRY_PATH."/app/controls");
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
}