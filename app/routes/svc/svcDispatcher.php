<?php
/**
 * @author awei.tian
 * date: 2013-9-17
 * 说明:
 */
require_once 'lib/interfaces/route/IDispatcher.php';
class svcDispatcher implements IDispatcher{

	public function __construct(){
		require_once 'app/svc/svcController.php';
	}

	/**
	 * 返回是否派遣成功
	 */
	public function dispatch($msg){
		new svcController(tian::$router->getRoute()->msg);
		return true;			

	}
}