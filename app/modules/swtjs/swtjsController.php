<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class swtjsController extends appCtrl{
	/**
	 *
	 * @var mainModel
	 */
	private $model;
	/**
	 *
	 * @var mainView
	 */
	private $view;
	
	public function __construct(){

	}
	public function welcomeAction(pmcaiMsg $msg){
		$response = new httpResponse();
		$response->ContentType(httpResponse::CONTENT_TYPE_JS);
		if(APP_MOBILE_MODE)
			include FILE_SYSTEM_ENTRY."/template/default_m/swt/swtjs.tpl.php";
		else
			include FILE_SYSTEM_ENTRY."/template/default/swt/swtjs.tpl.php";
	}
}