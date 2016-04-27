<?php
/**
 * Date: 2016-04-26
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/query/queryModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/query/queryView.php';
class queryController extends AppController{
	/**
	 * 
	 * @var queryModel
	 */
	private $model;
	/**
	 * 
	 * @var queryView
	 */
	private $view;
	public function __construct(){
		$this->model = new queryModel();
		$this->view = new queryView();
	}
	public function welcomeAction(pmcaiMsg $msg){
		$this->showFormUI($msg);
	}
	private function showFormUI(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showFormUI($msg->getPmcaiUrl()->getUrl());
	}
}