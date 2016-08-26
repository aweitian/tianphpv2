<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/disease/diseaseView.php";
require_once FILE_SYSTEM_ENTRY."/app/disease/diseaseModel.php";
class diseaseControllerNotFound{
	/**
	 *
	 * @var diseaseControllerNotFoundModel
	 */
	private $model;
	/**
	 *
	 * @var diseaseControllerNotFoundView
	 */
	private $view;
	private $allowAct;
	public function __construct(pmcaiMsg $msg){
		appCtrl::$msg = $msg;
		AppModule::$moduleName = "disease";
		$this->model = new diseaseControllerNotFoundModel();
		$this->view = new diseaseControllerNotFoundView();
		if (method_exists($this,$msg->getAction())){
			$this->{$msg->getAction()}($msg);
		}else{
			$this->_404();
		}
	}
	private function welcome(pmcaiMsg $msg){
		$pagestartime=microtime();
// 		sleep(3.005);
		$row = diseaseUIApi::getInstance()->getRowByDiskey($msg->getControl());
// 		var_dump($row);exit;
		$this->model->data = $row;
		$this->view->disease($this->model);
		
	}
	private function knowledge(pmcaiMsg $msg){
		$row = diseaseUIApi::getInstance()->getRowByDiskey($msg->getControl());
		$this->model->data = $row;
		$info = $msg->getPmcaiUrl()->getInfo();
		if(preg_match("/^[1-6]$/",$info)){
			$this->model->subid = intval($info);
		}
		$this->view->knowledge($this->model);
	}
	private function article(pmcaiMsg $msg){
		$row = diseaseUIApi::getInstance()->getRowByDiskey($msg->getControl());
		$this->model->data = $row;
		$this->view->article($this->model);
	}
	private function doctors(pmcaiMsg $msg){
		$row = diseaseUIApi::getInstance()->getRowByDiskey($msg->getControl());
		$this->model->data = $row;
		$this->view->doctors($this->model);
	}
	private function ask(pmcaiMsg $msg){
		$row = diseaseUIApi::getInstance()->getRowByDiskey($msg->getControl());
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