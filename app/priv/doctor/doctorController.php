<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorView.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctor_lv_validator.php';
class doctorController extends privController{
	/**
	 * 
	 * @var doctorModel
	 */
	private $model;
	/**
	 * 
	 * @var doctorView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new doctorModel();
		$this->view = new doctorView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){

	}
	public function editlvAction(pmcaiMsg $msg){
		if(!$msg->isPost()){
			$this->response->_404();
		}
		if(!isset($msg["data"],$msg["sid"])){
			$this->response->_404();
		}
		$retR = $this->model->doctor_lv_update($msg["sid"],$msg["data"]);
		if($retR->isTrue()){
			$this->response->go("/priv/doctor/lv");
		}else{
			$this->response->showError($retR->info);
		}
	}
	public function rmlvAction(pmcaiMsg $msg){
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$retR = $this->model->doctor_lv_remove($msg["?sid"]);
		if($retR->isTrue()){
			$this->response->go("/priv/doctor/lv");
		}else{
			$this->response->go("/priv/doctor/lv?err=".urlencode($retR->info));
		}
	}
	public function addlvAction(pmcaiMsg $msg){
		if(!$msg->isPost()){
			$this->response->_404();
		}
		if(!isset($msg["data"])){
			$this->response->_404();
		}
		$retR = $this->model->doctor_lv_add($msg["data"]);
		if($retR->isTrue()){
			$this->response->go("/priv/doctor/lv");
		}else{
			$this->response->go("/priv/doctor/lv?err=".urlencode($retR->info));
		}
	}
	public function lvAction(pmcaiMsg $msg){
		$dataRet = $this->model->doctor_lv_all();
		if(!$dataRet->isTrue()){
			$this->response->showError($dataRet->info);
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->showDoctorLvList($this->priv->getUserInfo(), $dataRet->return,$msg["?err"]);
	}
}