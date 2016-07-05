<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/put/putView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/put/putModel.php";
class putController extends appCtrl{
	/**
	 *
	 * @var putModel
	 */
	private $model;
	/**
	 *
	 * @var putView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new putModel();
		$this->view = new putView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->put($this->model);
	}
}