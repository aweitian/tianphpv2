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
	//医院简介
	public function introAction(){
		$this->view->intro($this->model);
	}
	//流程
	public function processAction(){
		$this->view->process($this->model);
	}
	//须知
	public function noticeAction(){
		$this->view->notice($this->model);
	}
	//声明
	public function policyAction(){
		$this->view->policy($this->model);
	}
	//收费
	public function guideAction(){
		$this->view->guide($this->model);
	}
	//收费
	public function environmentAction(){
		$this->view->environment($this->model);
	}
}