<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY. "/app/AppInit.php";

class App{
	private function __construct(){
		
		
	}
	/**
	 * 
	 * 1. 环境名初始化
	 * 2. 初始化IdentityEoken
	 * 4. HttpRequest
	 * 5. HttpResponse
	 * 6. initRouter
	 */
	public static function init(){
		require_once FILE_SYSTEM_ENTRY.'/app/routes/svc/svcRoute.php';
		require_once FILE_SYSTEM_ENTRY.'/lib/route/routes/pmcai/pmcaiRoute.php';
		require_once FILE_SYSTEM_ENTRY.'/app/routes/svc/svcDispatcher.php';
	}
	private static function _defPreMask(){
		if(!HTTP_ENTRY)return "";
		return str_repeat("p", count(explode("/", trim(HTTP_ENTRY,"/"))));
	}
	public static function run(){
		$req = new httpRequest();
		$pmcaiMask = App::_defPreMask()."ca";
		$router = new router();
		$svcRoute = new svcRoute();
		$defRoute = new pmcaiRoute($pmcaiMask);
		$router->addRoute("svc", $svcRoute);
		$router->addRoute("default", $defRoute);
		
// 		var_dump($pmcaiMask);
		
		$router->route($req->requestUri());
		$dispatcher = null;
		$routeName = $router->getMatchedRouteName();
		switch ($routeName){
			case "default":
				$pmcaiUrl = $defRoute->getPmcaiUrl();
				debug::d("route://default route matched.Control:".$pmcaiUrl->getControl()." Action:".$pmcaiUrl->getAction());
				$msg = new pmcaiMsg($req, $pmcaiUrl);
				$dispatcher = new pmcaiDispatcher();
	
				if (!$dispatcher->dispatch($msg) && DEBUG_FLAG) {
					$dispatcher->appendDebugInfo();
					debug::output();
				}
			
// 				tian::$dispatcher->debug();
				break;
			case "svc":
				tian::$dispatcher = new svcDispatcher();
				tian::$dispatcher->dispatch($d);
				break;
		}
	}
}