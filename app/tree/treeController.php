<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY . "/app/tree/treeView.php";
require_once FILE_SYSTEM_ENTRY . "/app/tree/treeModel.php";
class treeControllerNotFound {
	/**
	 *
	 * @var treeControllerNotFoundModel
	 */
	private $model;
	/**
	 *
	 * @var treeControllerNotFoundView
	 */
	private $view;
	private $allowAct;
	public function __construct(pmcaiMsg $msg, $channel, $aid) {
		appCtrl::$msg = $msg;
		AppModule::$moduleName = "tree";
		if (! preg_match ( "/^[\w\/]+$/", $channel )) {
			$this->_404 ();
		}
		$this->model = new treeControllerNotFoundModel ();
		$this->view = new treeControllerNotFoundView ();
		$this->model->channel = $channel;
		$this->model->aid = $aid;
		// var_dump(FILE_SYSTEM_ENTRY . "/" . THEME . "/tree/" . trim ( $channel , "/" ) . "/index.tpl.php");exit();
		if ($aid > 0) {
			if (treeUIApi::getInstance ()->existAid ( $aid,$channel )) {
				$this->page ( $msg );
			} else {
				$this->_404 ();
			}
		} else if ($aid == 0) {
			$type = treeUIApi::getInstance ()->getType ( $channel );
			
			if ($type == treeUIApi::TYPE_CLASS) {
				$this->cls ( $msg );
			} else if ($type == treeUIApi::TYPE_LIST) {
				$this->lst ( $msg );
			} else {
				$this->_404();
			}
		} else {
			$this->_404();
		}
	}
	private function lst(pmcaiMsg $msg) {
		$tpl = FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/" . trim ( $this->model->channel, "/" ) . "/list.tpl.php";
		if (! file_exists ( $tpl )) {
			$tpl = FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/list.tpl.php";
		}
		$this->view->lst ( $this->model, $tpl );
	}
	private function cls(pmcaiMsg $msg) {
		$tpl = FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/" . trim ( $this->model->channel, "/" ) . "/class.tpl.php";
		if (! file_exists ( $tpl )) {
			$tpl = FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/class.tpl.php";
		}
		$this->view->cls ( $this->model, $tpl );
	}
	private function page(pmcaiMsg $msg) {
		$tpl = FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/" . trim ( $this->model->channel, "/" ) . "/page.tpl.php";
		if (! file_exists ( $tpl )) {
			$tpl = FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/page.tpl.php";
		}
		$this->model->data = $this->model->getArticleRow ( $this->model->aid );
		$this->view->page ( $this->model, $tpl );
	}
	private function _404() {
		$res = new httpResponse ();
		$res->_404 ();
	}
	// public function _action_not_found(pmcaiMsg $msg){
	// $action = $msg->getAction();
	// $data = $this->model->getRowByDiskey($action);
	// //echo "hi";
	// if(empty($data)){
	// $this->response->_404();
	// }else{
	// //病种ID
	// $did = $data["sid"];
	
	// //var_dump($this->model->getArticleTag7ByDid($data["sid"]));
	// $this->view->home($this->model);
	// }
	// }
}