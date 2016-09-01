<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/tree/treeView.php";
require_once FILE_SYSTEM_ENTRY."/app/tree/treeModel.php";
class treeControllerNotFound{
	/**
	 *
	 * @var treeControllerNotFoundModel
	 */
	private $model;
	/**
	 *
	 * @var treeControllerNotFoundView
	 */
	private $view;
	private $allowAct;
	public function __construct(pmcaiMsg $msg){
		appCtrl::$msg = $msg;
		AppModule::$moduleName = "tree";
		$this->model = new treeControllerNotFoundModel();
		$this->view = new treeControllerNotFoundView();
		if (method_exists($this,$msg->getAction())){
			$this->{$msg->getAction()}($msg);
		}else{
			$this->_404();
		}
	}
	private function welcome(pmcaiMsg $msg){
		$pagestartime=microtime();
// 		sleep(3.005);
		$row = treeUIApi::getInstance()->getRowByDiskey($msg->getControl());
// 		var_dump($row);exit;
		$this->model->data = $row;
		$this->view->tree($this->model);
		
	}
	private function knowledge(pmcaiMsg $msg){
		$row = treeUIApi::getInstance()->getRowByDiskey($msg->getControl());
		$this->model->data = $row;
		$info = $msg->getPmcaiUrl()->getInfo();
		if(preg_match("/^[1-6]$/",$info)){
			$this->model->subid = intval($info);
		}
		$this->view->knowledge($this->model);
	}
	private function tree(pmcaiMsg $msg){
		$row = treeUIApi::getInstance()->getRowByDiskey($msg->getControl());
		$this->model->data = $row;
		$this->view->tree($this->model);
	}
	private function doctors(pmcaiMsg $msg){
		$row = treeUIApi::getInstance()->getRowByDiskey($msg->getControl());
		$this->model->data = $row;
		$this->view->doctors($this->model);
	}
	private function ask(pmcaiMsg $msg){
		$row = treeUIApi::getInstance()->getRowByDiskey($msg->getControl());
		$this->model->data = $row;
		$this->view->ask($this->model);
	}
	
	
	private function _404(){
		$res = new httpResponse();
		$res->_404();
	}
// 	public function _action_not_found(pmcaiMsg $msg){
// 		$action = $msg->getAction();
// 		$data = $this->model->getRowByDiskey($action);
// 		//echo "hi";
// 		if(empty($data)){
// 			$this->response->_404();
// 		}else{
// 			//病种ID
// 			$did = $data["sid"];
			
// 			//var_dump($this->model->getArticleTag7ByDid($data["sid"]));
// 			$this->view->home($this->model);
// 		}
// 	}


}