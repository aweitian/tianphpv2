<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY . "/app/modules/user/userView.php";
require_once FILE_SYSTEM_ENTRY . "/app/modules/user/userModel.php";

class userController extends appCtrl {
	
	/**
	 *
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
	public function __construct() {
		$this->initHttpResponse();
		$this->chkPriv();
		$this->model = new userModel ();
		$this->view = new userView ();
	}
	private function chkPriv(){
		$msg = appCtrl::$msg;
// 		var_dump(!in_array($msg->getAction(), array("login","register","resetpwd")));exit;
		if (!in_array($msg->getAction(), array("login","register","resetpwd"))){
			if(!AppUser::getInstance()->auth->isLogined()){
				$this->response->redirect(AppUrl::userLogin());
			}
		}
		
	}
	private function performReturn() {
		if (isset ( $_REQUEST ["return"] )) {
			$this->response->redirect ( $_REQUEST ["return"] );
		} else {
			$this->response->go ( "/user" );
		}
	}
	public function welcomeAction(pmcaiMsg $msg) {
		// $this->view->user($this->model);
		$this->profileAction($msg);
// 		$this->view->profile($this->model);
	}
	
	public function profileAction(pmcaiMsg $msg){
		if($msg->isPost()){
			$i = AppUser::getInstance()->auth->getInfo();
			$ret = $this->model->modProfile(
					$i["sid"], 
					$msg["name"],
					$msg["email"],
					$msg["phone"],
					$msg["rpq"],
					$msg["rpa"]
			);
			
			
			if($ret->isTrue()){
				AppUser::getInstance()->auth->saveInfo($ret->return);
				$this->view->profile($this->model,"修改成功");
			}else{
				$this->view->profile($this->model,$ret->info);
			}
		}
		$this->view->profile($this->model);
	}
	public function avatarAction(pmcaiMsg $msg){
		if($msg->isPost()){
			$i = AppUser::getInstance()->auth->getInfo();
			$ret = $this->model->avatar($i["sid"], $msg["i"]);
			if($ret->isTrue()){
				AppUser::getInstance()->auth->saveInfo($ret->return);
				$this->view->avatar($this->model,"修改成功");
			}else{
				$this->view->avatar($this->model,$ret->info);
			}
		}
		$this->view->avatar($this->model);
	}
	
	
	public function modpwdAction(pmcaiMsg $msg){
		if($msg->isPost()){
			$i = AppUser::getInstance()->auth->getInfo();
			$ret = $this->model->modpwd($i["sid"], $msg["op"],$msg["np"]);
			if($ret->isTrue()){
				$this->view->modify($this->model,"修改成功");
			}else{
				$this->view->modify($this->model,$ret->info);
			}
		}
		$this->view->modify($this->model);
	}
	
	
	
	public function logoutAction(pmcaiMsg $msg){
		AppUser::getInstance()->auth->logout();
		$this->response->redirect(AppUrl::userLogin());
	}
	
	public function loginAction(pmcaiMsg $msg) {
		if (AppUser::getInstance()->auth->isLogined ()) {
			$this->performReturn ();
		}
		$this->model->initSession($this->sesion);
		if(!$this->model->chkLoginPermit()){
			$this->response->_404();
		}
		if ($msg->isPost ()) {
			$ret = $this->model->chk ($msg ["nep"], $msg ["pwd"], isset ( $msg ["code"] ) ? $msg ["code"] : "" );
			if ($ret->isTrue ()) {
// 				var
				
				$this->performReturn ();
			} else {
				$this->view->login ( $this->model, $ret->info );
			}
		} else {
			$this->view->login ( $this->model );
		}
	}
	public function registerAction(pmcaiMsg $msg) {
		if ($msg->isPost ()) {
			if (! isset ( $msg ["?t"] )) {
				$this->response->_404 ();
			} else if ($msg ["?t"] == "n") {
				$ret = $this->model->register_normal ( $msg ["name"], $msg ["pwd"], $msg ["sq"], $msg ["sa"], $msg ["eml"], $msg ["code"] );
				if($ret->isTrue()){
					exit($ret->info);
				}else{
					exit("<font color='red'>".$ret->info."</font>");
				}
			} else if ($msg ["?t"] == "m") {
			}
		} else {
			$this->view->register ( $this->model );
		}
	}
	public function resetpwdAction(pmcaiMsg $msg) {
		if ($msg->isPost() && isset($msg["?s"]) && $msg["?s"] == "2") {
// 			var_dump($msg["n"], $msg["q"], $msg["a"], $msg["p"]);
			$ret = $this->model->resetPwd($msg["n"], $msg["q"], $msg["a"], $msg["p"]);
			if($ret->isTrue()){
				$this->view->resetpwd ( $this->model ,$ret->info);
			}else{
				$this->view->resetpwd ( $this->model ,$ret->info);
			}
		}else{
			$this->view->resetpwd ( $this->model );
		}
	}
}