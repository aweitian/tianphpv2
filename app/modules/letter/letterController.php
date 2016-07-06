<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/letter/letterView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/letter/letterModel.php";
class letterController extends appCtrl{
	/**
	 *
	 * @var letterModel
	 */
	private $model;
	/**
	 *
	 * @var letterView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new letterModel();
		$this->view = new letterView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->letter($this->model);
	}
}