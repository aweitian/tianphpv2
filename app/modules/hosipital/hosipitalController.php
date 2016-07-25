<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY . "/app/modules/hosipital/hosipitalView.php";
require_once FILE_SYSTEM_ENTRY . "/app/modules/hosipital/hosipitalModel.php";
class hosipitalController extends appCtrl implements IActionNotFound {
	/**
	 *
	 * @var hosipitalModel
	 */
	private $model;
	/**
	 *
	 * @var hosipitalView
	 */
	private $view;
	public function __construct() {
		$this->initHttpResponse ();
		$this->model = new hosipitalModel ();
		$this->view = new hosipitalView ();
	}
	public function _action_not_found(pmcaiMsg $msg) {
		// var_dump($msg->getPmcaiUrl()->getPmcai());
		if (preg_match ( "/^index_(\d+)\.html$/", $msg->getAction (), $matches )) {
			$page = $matches[1];
			$this->view->lst($this->model,$page);
		} else if(preg_match ( "/^(\d+)\.html$/", $msg->getAction (), $matches )) {
			$aid =  $matches[1];
			//echo "$aid";
			$this->view->page($this->model,$aid);
		} else {
			$this->response->_404 ();
		}
	}
	public function welcomeAction(pmcaiMsg $msg) {
		$this->view->lst($this->model,1);
		// var_dump($msg->getPmcaiUrl()->getPmcai());
		// $this->view->hosipital($this->model);
	}
}