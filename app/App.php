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
		//初始化httpRequest
		$req = new httpRequest();
		
		//初始化默认路由规则(PMCAI路由规则)
		$pmcaiMask = App::_defPreMask()."ca";
		$defRoute = new pmcaiRoute($pmcaiMask);
		
		//初始化SVC路由规则(它只要是以HTTP_ENTRY/svc开头就行，
		//具体参考app/routes/svc/svcRoute.php的match方法
		$svcRoute = new svcRoute();
		
		//初始化路由器
		$router = new router();
		
		//把默认路由规则和SVC路由规则添加到路由器中,第一个参数是路由规则名称
		$router->addRoute("svc", $svcRoute);
		$router->addRoute("default", $defRoute);
		
		//把当前URL传递到路由器，让它匹配
		$router->route($req->requestUri());
		
		
		$dispatcher = null;
		
		//获取匹配的路由规则名称
		$routeName = $router->getMatchedRouteName();
		switch ($routeName){
			case "svc":
				//svc消息类初始化
				$msg = new svcMsg($req, $svcRoute->getSvcPath());
				//SVC派遣器初始化
				$dispatcher = new svcDispatcher();
				//派遣器svc消息
				$dispatcher->dispatch($msg);
				break;
			case "default":
			
				//如果是PMCAI路由规则匹配
				$pmcaiUrl = $defRoute->getPmcaiUrl();
				//debug::d("route://default route matched.Control:".$pmcaiUrl->getControl()." Action:".$pmcaiUrl->getAction());
			
				//初始化pmcai消息类，它删除$_GET,$_POST变量(继承于message的原因)
				//并作为CONTROLLER方法的第一个参数传递
				//更多细节参数pmcaiMsg类和message类
				$msg = new pmcaiMsg($req, $pmcaiUrl);
			
				//初始化PMCAI派遣器派遣
				$dispatcher = new pmcaiDispatcher();
			
				if (!$dispatcher->dispatch($msg) && DEBUG_FLAG) {
					//如果404，并且是调试模式，输出路由，派遣信息
					$router->appendDebugInfo();
					$dispatcher->appendDebugInfo();
					debug::output();
				} else {
					//404
					$rep = new httpResponse();
					$rep->_404();
				}
				break;
			default:
				//代码不会运行到这儿
				exit("Error");
		}
	}
}