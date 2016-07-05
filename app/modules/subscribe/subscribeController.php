<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/subscribe/subscribeView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/subscribe/subscribeModel.php";
class subscribeController extends appCtrl{
	/**
	 *
	 * @var subscribeModel
	 */
	private $model;
	/**
	 *
	 * @var subscribeView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new subscribeModel();
		$this->view = new subscribeView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->subscribe($this->model);
	}
}