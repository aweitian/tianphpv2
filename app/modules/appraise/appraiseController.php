<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/appraise/appraiseView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/appraise/appraiseModel.php";
class appraiseController extends appCtrl{
	/**
	 *
	 * @var appraiseModel
	 */
	private $model;
	/**
	 *
	 * @var appraiseView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new appraiseModel();
		$this->view = new appraiseView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->appraise($this->model);
	}
}