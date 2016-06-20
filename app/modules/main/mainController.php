<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/main/mainView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/main/mainModel.php";
class mainController extends appCtrl{
	/**
	 *
	 * @var mainModel
	 */
	private $model;
	/**
	 *
	 * @var mainView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new mainModel();
		$this->view = new mainView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->main($this->model);
	}
}