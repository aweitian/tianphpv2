<?php
/**
 * Date: 2016-04-18
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/ideaq/ideaqModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/ideaq/ideaqView.php';
class ideaqController extends AppController{
	/**
	 * 
	 * @var ideaqModel
	 */
	private $model;
	/**
	 * 
	 * @var ideaqView
	 */
	private $view;
	public function __construct(){
		$this->model = new ideaqModel();
		$this->view = new ideaqView();
	}
	public function welcomeAction(pmcaiMsg $msg){
		$queryResult = "";
		if(isset($msg["?id"])){
			$queryResult = $this->model->test($msg["?id"]);
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->showFormUI($msg->getPmcaiUrl()->getUrl(),$queryResult);
	}
}