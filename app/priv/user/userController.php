<?php
/**
 * Date: 2016-05-13
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY . '/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY . '/app/priv/user/userModel.php';
require_once FILE_SYSTEM_ENTRY . '/app/priv/user/userView.php';
class userController extends privController {
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
	public function __construct() {
		$this->checkPriv ();
		$this->model = new userModel ();
		$this->view = new userView ();
		$this->initHttpResponse ();
	}
	public function resetpwdAction(pmcaiMsg $msg) {
	}
	public function welcomeAction(pmcaiMsg $msg) {
	}
	public function forceresetpwdAction(pmcaiMsg $msg) {
		if ($msg->isPost ()) {
			if (! isset ( $msg ["sid"], $msg ["pwd"] )) {
				$this->response->_404 ();
			}
			$retR = $this->model->forceResetPwd ( $msg ["sid"], $msg ["pwd"] );
			if ($retR->isTrue ()) {
				$this->response->redirect ( $_SERVER ["HTTP_REFERER"] );
				exit ();
			} else {
				$this->response->showError ( $retR->info );
				;
			}
		}
		$this->response->_404 ();
	}
	public function qAction(pmcaiMsg $msg) {
		$length = 10; // 每页显示多少行
		
		if (isset ( $msg ["?page"] )) {
			$page = intval ( $msg ["?page"] );
		} else {
			$page = 1;
		}
		if ($page < 1) {
			$page = 1;
		}
		
		$offset = ($page - 1) * $length;
		if (! isset ( $msg ["?q"] )) {
			return $this->welcomeAction ( $msg );
		}
		if ($msg ["?q"] == "") {
			return $this->welcomeAction ( $msg );
		}
		
		$data = $this->model->q ( $msg ["?q"], $offset, $length );
		
		if ($data->isTrue ()) {
			
			$this->view->setPmcaiMsg ( $msg );
			
			$this->view->showList ( $msg->getPmcaiUrl (), $this->priv->getUserInfo (), $data->return, $page, $length, $msg ["?q"] );
		} else {
			$this->response->showError ( $data->info );
			;
		}
	}
	public function rmAction(pmcaiMsg $msg) {
		$ret_url = $_SERVER ["HTTP_REFERER"];
		if (! isset ( $msg ["?sid"] )) {
			$this->response->_404 ();
		}
		$this->model->remove ( intval ( $msg ["?sid"] ) );
		$this->response->redirect ( $ret_url );
	}
	public function editAction(pmcaiMsg $msg) {
		if ($msg->isPost ()) {
			if (! isset ( $msg ["sid"], $msg ["email"], $msg ["name"], $msg ["phone"], $msg ["avatar"], $msg ["date"] )) {
				$this->response->_404 ();
			}
			$retR = $this->model->update ( $msg ["sid"], $msg ["email"], $msg ["name"], $msg ["phone"], $msg ["avatar"], $msg ["date"] );
			if ($retR->isTrue ()) {
				if (isset ( $msg ["?returl"] )) {
					$ret_url = $msg ["?returl"];
				} else {
					$ret_url = "";
				}
				$this->view->showEditSucc ( $this->priv->getUserInfo (), $ret_url );
			} else {
				$this->response->showError ( $retR->info );
				;
			}
		} else {
			if (! isset ( $msg ["?sid"] )) {
				$this->response->_404 ();
			}
			$this->view->setPmcaiMsg ( $msg );
			$rowR = $this->model->row ( intval ( $msg ["?sid"] ) );
			if (! $rowR->isTrue ()) {
				$this->response->_404 ();
			}
			$this->view->showForm ( $this->priv->getUserInfo (), $rowR->return );
		}
	}
	public function addAction(pmcaiMsg $msg) {
		if ($msg->isPost ()) {
			if (! isset ( $msg ["email"], $msg ["name"], $msg ["pwd"], $msg ["phone"], $msg ["avatar"], $msg ["rpq"], $msg ["rpa"], $msg ["date"] )) {
				$this->response->_404 ();
			}
			$retR = $this->model->add ( $msg ["email"], $msg ["name"], $msg ["pwd"], $msg ["phone"], $msg ["avatar"], $msg ["rpq"], $msg ["rpa"], $msg ["date"] );
			if ($retR->isTrue ()) {
				if (isset ( $msg ["?returl"] )) {
					$ret_url = $msg ["?returl"];
				} else {
					$ret_url = "";
				}
				$this->view->showAddSucc ( $this->priv->getUserInfo (), $ret_url );
			} else {
				$this->response->showError ( $retR->info );
			}
		} else {
			$this->view->setPmcaiMsg ( $msg );
			$this->view->showForm ( $this->priv->getUserInfo () );
		}
	}
}