<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class App{
	private function __construct(){
		
	}
	public static function init(){
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
}