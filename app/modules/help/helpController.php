<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/help/helpView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/help/helpModel.php";
class helpController extends appCtrl{
	/**
	 *
	 * @var helpModel
	 */
	private $model;
	/**
	 *
	 * @var helpView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new helpModel();
		$this->view = new helpView();
	}
	
	public function aboutAction() {
		$this->view->about($this->model);
	}
	
	public function routingAction(){
		$this->view->routing($this->model);
	}
	public function sendsmsproxyAction(){
		$this->view->sendsmsproxy($this->model);
	}
}