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
		$this->model = new userModel ();
		$this->view = new userView ();
	}
	private function performReturn() {
		if (isset ( $_REQUEST ["return"] )) {
			$this->response->redirect ( $_REQUEST ["return"] );
		} else {
			if (isset ( $_SERVER ["HTTP_REFERER"] )) {
				$this->response->redirect ( $_SERVER ["HTTP_REFERER"] );
			} else {
				$this->response->go ( "/user" );
			}
		}
	}
	public function welcomeAction() {
		// $this->view->user($this->model);
		$this->view->profile($this->model);
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
	public function resetpwdAction() {
		$this->view->resetpwd ( $this->model );
	}
}