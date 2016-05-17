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
		
		$this->model = new loginModel();
		$this->view = new loginView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		$priv = new priv(App::getSession());
		if($priv->isLogined()){
			$this->response->go("/priv");
		}
		if($msg->isPost()){
			if(!isset($msg["email"],$msg["pwd"])){
				$this->response->_404();
			}
			if(!isset($msg["code"])){
				$code = "";
			}else{
				$code = $msg["code"];
			}
			
			if($priv->check($msg["email"],$msg["pwd"],$code)){
				if(isset($msg["?redirect"])){
					$this->response->redirect($msg["?redirect"]);
				}else{
					$this->response->go("/priv");
				}
			}else{
				$this->view->setPmcaiMsg($msg);
				$this->view->loginUI($priv,$priv->errorMsg);
			}
			
		}else{
			$this->view->setPmcaiMsg($msg);
			if(isset($msg["?redirect"])){
				$url = $msg["?redirect"];
			}else{
				$url = "";
			}
			$this->view->loginUI($priv,"输入用户名和密码登陆",$url);			
		}

	}
	public function logoutAction(pmcaiMsg $msg){
		$priv = new priv(App::getSession());
		$priv->logout();
		$this->response->go("/priv/login");
	}
}