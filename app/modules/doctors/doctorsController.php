<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/doctors/doctorsView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/doctors/doctorsModel.php";
class doctorsController extends appCtrl{
	/**
	 *
	 * @var doctorsModel
	 */
	private $model;
	/**
	 *
	 * @var doctorsView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new doctorsModel();
		$this->view = new doctorsView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->doctors($this->model);
	}
}