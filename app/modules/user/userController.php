<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/user/userView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/user/userModel.php";
class userController extends appCtrl{
	
	/**
	 * @var session_userAuth
	 */
	public $session_auth;
	/**
	 *
	 * @var userModel
	 */
	private $model;
	/**
	 *
	 * @var userView
	 */
	private $view;
	
	public $sesion;
	public function __construct(){
		$this->model = new userModel();
		$this->view = new userView();
		$this->sesion = new session(); 
		$this->session_auth = new session_userAuth($this->sesion);
		if($this->session_auth->isLogined()){
			$this->performReturn();
		}
	}
	private function performReturn(){
		if(isset($_REQUEST["return"])){
			$this->response->redirect($_REQUEST["return"]);
		}else{
			if(isset($_SERVER["HTTP_REFERER"])){
				$this->response->redirect($_SERVER["HTTP_REFERER"]);
			}else{
				$this->response->go("/");
			}
		}
	}
	public function welcomeAction(){
		//$this->view->user($this->model);
	}
	
	public function loginAction(pmcaiMsg $msg){
		if($msg->isPost()){
			$ret = $this->model->login($this,$msg["nep"], $msg["pwd"],isset($msg["code"]) ? $msg["code"] : "");
			if($ret->isTrue()){
				$this->performReturn();
			}else{
				$this->view->login($this->model,$ret->info);
			}
		}else{
			$this->view->login($this->model);
		}
	}
	public function registerAction(){
		$this->view->register($this->model);
	}
	public function resetpwdAction(){
		$this->view->resetpwd($this->model);
	}
}