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
// 		var_dump(FILE_SYSTEM_ENTRY . "/" . THEME . "/tree/" . trim ( $channel , "/" ) . "/index.tpl.php");exit();
		if ($aid > 0) {
			if(treeUIApi::getInstance()->existAid($aid)) {
				$this->article ( $msg );
			} else {
				$this->_404 ();
			}
			
		} else if ($aid == 0 && file_exists ( FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/" . trim ( $channel , "/" ) . "/index.tpl.php" )) {
			$this->channel ( $msg, FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/" . trim ( $channel , "/" ) . "/index.tpl.php" );
		} else {
			$this->_404 ();
		}
	}
	private function channel(pmcaiMsg $msg, $tpl) {
		$this->view->channel ( $this->model, $tpl );
	}
	private function article(pmcaiMsg $msg) {
		$this->model->data = $this->model->getArticleRow ( $this->model->aid );
		$this->view->article ( $this->model );
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