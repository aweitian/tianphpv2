<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/ask/askView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/ask/askModel.php";
class askController extends appCtrl{
	/**
	 *
	 * @var askModel
	 */
	private $model;
	/**
	 *
	 * @var askView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new askModel();
		$this->view = new askView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->ask($this->model);
	}
}