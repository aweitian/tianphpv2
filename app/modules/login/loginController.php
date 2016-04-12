<?php
/**
 * Date: 2016-04-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/login/loginModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/login/loginView.php';
class loginController extends AppController{
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
		$this->model = new loginModel();
		$this->view = new loginView();
	}
	public function welcomeAction(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showLoginUI($msg->getPmcaiUrl()->getUrl());
	}
}