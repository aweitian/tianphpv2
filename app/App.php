<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY . "/app/AppInit.php";
class App {
	/**
	 *
	 * @var session
	 */
	private static $session;
	private function __construct() {
	}
	public static function getSession() {
		if (is_null ( self::$session )) {
			self::$session = new session ();
		}
		return self::$session;
	}
	/**
	 * 1. 环境名初始化
	 * 2. 初始化IdentityEoken
	 * 4. HttpRequest
	 * 5. HttpResponse
	 * 6. initRouter
	 */
	public static function init() {
		// LOAD EXCEPTIONS
		tian::addExceptionDir ( FILE_SYSTEM_ENTRY . "/app/exceptions" );
		// require_once FILE_SYSTEM_ENTRY.'/app/routes/svc/svcRoute.php';
		require_once FILE_SYSTEM_ENTRY . '/lib/route/routes/pmcai/pmcaiRoute.php';
		// require_once FILE_SYSTEM_ENTRY.'/app/routes/svc/svcDispatcher.php';
	}
	public static function run() {
		// 初始化httpRequest
		$req = new httpRequest ();
		
		// 初始化默认路由规则(PMCAI路由规则)
		$defRoute = new pmcaiRoute ( require FILE_SYSTEM_ENTRY . '/app/conf/routeTable.php' );
		
		// 初始化SVC路由规则(它只要是以HTTP_ENTRY/svc开头就行，
		// 具体参考app/routes/svc/svcRoute.php的match方法
		// $svcRoute = new svcRoute();
		
		// 初始化路由器
		$router = new router ();
		
		// 把默认路由规则和SVC路由规则添加到路由器中,第一个参数是路由规则名称
		// $router->addRoute("svc", $svcRoute);
		$router->addRoute ( "default", $defRoute );
		
		// 把当前URL传递到路由器，让它匹配
		$router->route ( $req->requestUri () );
		
		$dispatcher = null;
		
		// 获取匹配的路由规则名称
		$routeName = $router->getMatchedRouteName ();
		switch ($routeName) {
			// case "svc":
			// //svc消息类初始化
			// $msg = new svcMsg($req, $svcRoute->getSvcPath());
			// //SVC派遣器初始化
			// $dispatcher = new svcDispatcher();
			// //派遣器svc消息
			// $dispatcher->dispatch($msg);
			// break;
			case "default" :
				
				// 如果是PMCAI路由规则匹配
				$pmcaiUrl = $defRoute->getPmcaiUrl ();
				// debug::d("route://default route matched.Control:".$pmcaiUrl->getControl()." Action:".$pmcaiUrl->getAction());
				
				// 初始化pmcai消息类，它删除$_GET,$_POST变量(继承于message的原因)
				// 并作为CONTROLLER方法的第一个参数传递
				// 更多细节参数pmcaiMsg类和message类
				$msg = new pmcaiMsg ( $req, $pmcaiUrl );
				$msg->setModuleLoc ( $defRoute->getModuleLoc () );
				
				// exit($defRoute->getModuleLoc());
				
				// 初始化PMCAI派遣器派遣
				$dispatcher = new pmcaiDispatcher ();
				
				if (! $dispatcher->dispatch ( $msg )) {
					if (DEBUG_FLAG) {
						// 如果404，并且是调试模式，输出路由，派遣信息
						$router->appendDebugInfo ();
						$dispatcher->appendDebugInfo ();
						debug::output ();
					} else {
						// 404
						$rep = new httpResponse ();
						$rep->_404 ();
					}
				}
				break;
			default :
				// 代码不会运行到这儿
				exit ( "Error" );
		}
	}
	/**
	 * 对A标签是否启用新窗口打开
	 */
	public static function useTarget() {
		if(TARGET_BLANK_OPEN){
			return ' target="_blank"';
		}
		return ' target="_blank"';
	}
	public static function myErrorHandler($errno, $errstr, $errfile, $errline) {
		if (! (error_reporting () & $errno)) {
			// This error code is not included in error_reporting
			return;
		}
	
		switch ($errno) {
			case E_USER_ERROR :
				echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
				echo "  Fatal error on line $errline in file $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
				echo "Aborting...<br />\n";
				exit ( 1 );
				break;
					
			case E_USER_WARNING :
				echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
				break;
					
			case E_USER_NOTICE :
				echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
				break;
					
			default :
				debug_print_backtrace ();
				echo "Unknown error type: [$errno] $errstr<br />\n";
				break;
		}
	
		/* Don't execute PHP internal error handler */
		return true;
	}
}