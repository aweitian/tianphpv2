<?php
/**
 * @author awei.tian
 * date: 2013-9-17
 * 说明:
 */
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IDispatcher.php';
class svcDispatcher implements IDispatcher{

	public function __construct(){
		require_once FILE_SYSTEM_ENTRY.'/app/svc/svcController.php';
	}

	/**
	 * 返回是否派遣成功
	 */
	public function dispatch($msg){
		new svcController($msg);
		return true;			
	}
}