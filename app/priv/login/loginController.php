<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/modules/priv/priv.php";
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
		
		$this->model = new loginModel();
		$this->view = new loginView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["email"],$msg["pwd"])){
				$this->response->_404();
			}
			if(!isset($msg["code"])){
				$code = "";
			}else{
				$code = $msg["code"];
			}
			$priv = new priv(App::getSession());
			if($priv->check($msg["email"],$msg["pwd"],$code)){
				$this->response->go("/priv");
			}else{
				$this->view->setPmcaiMsg($msg);
				$this->view->loginUI($priv,"用户名和密码不匹配");
			}
			
		}else{
			$priv = new priv(App::getSession());
			$this->view->setPmcaiMsg($msg);
			$this->view->loginUI($priv,"输入用户名和密码登陆");			
		}

	}

}