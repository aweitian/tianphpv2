<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/login/loginModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/login/loginView.php';
class loginController extends privController{
	/**
	 * 
	 * @var loginModel
	 */
	private $model;
	/**
	 * 
	 * @var loginView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new loginModel();
		$this->view = new loginView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){

	}
}