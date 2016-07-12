<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/doctors/doctorsModel.php";
require_once FILE_SYSTEM_ENTRY."/app/doctors/doctorsView.php";
class doctorsControllerNotFound{
	/**
	 * 
	 * @var doctorsViewControllerNotFound
	 */
	private $view;
	/**
	 * 
	 * @var doctorsModelControllerNotFound
	 */
	private $model;
	
	private $m;
	private $doc;
	private $allowAct;
	public function __construct(pmcaiMsg $msg){
		$this->allowAct = array(
				"welcome" => 1,
				"article" => 1,
				"ask" => 1,
				"present" => 1,
				"appraise" => 1,
				"letter" => 1
		);
		
		$this->model = new doctorsModelControllerNotFound();
		$this->view  = new doctorsViewControllerNotFound();
		if (array_key_exists($msg->getAction(), $this->allowAct)){
			$this->{$msg->getAction()}($msg);
		}else{
			$this->_404();
		}
	}
	
	public function _404(){
		$res = new httpResponse();
		$res->_404();
	}
	protected function ask(pmcaiMsg $msg){
		$row = doctorUIApi::getInstance()->getInfoById($msg->getControl());
		$this->model->data = $row;
		$this->view->ask($this->model);
	}
	protected function welcome(pmcaiMsg $msg){
		$row = doctorUIApi::getInstance()->getInfoById($msg->getControl());
		$this->model->data = $row;
		$this->view->home($this->model);
	}
	protected function present(pmcaiMsg $msg){
		$row = doctorUIApi::getInstance()->getInfoById($msg->getControl());
		$this->model->data = $row;
		$this->view->present($this->model);
	}
	protected function article(pmcaiMsg $msg){
		$row = doctorUIApi::getInstance()->getInfoById($msg->getControl());
		$this->model->data = $row;
		if(isset($msg["?id"])){
			$this->view->content($this->model);
		}else{
			$this->view->article($this->model);
		}
	}
}