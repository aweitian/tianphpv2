<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/hospital/hospitalView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/hospital/hospitalModel.php";
class hospitalController extends appCtrl{
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
		$this->model = new hospitalModel();
		$this->view = new hospitalView();
	}
	public function welcomeAction(){
		$this->view->hospital($this->model);
	}
}