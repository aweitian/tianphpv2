<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/utility/pagination.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorView.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctor_lv_validator.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorValidator.php';
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
		$length = 10;//每页显示多少行
		
		if(isset($msg["?page"])){
			$page = intval($msg["?page"]);
		}else{
			$page = 1;
		}
		if($page < 1){
			$page = 1;
		}
		
		$offset = ($page - 1) * $length;
		$data = $this->model->getList($offset,$length);
		$dataRet = $this->model->doctor_lv_all();
		if($data->isTrue()){
			$this->view->setPmcaiMsg($msg);
			$this->view->showList($msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),$data->return,$dataRet->return,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($retR->info);;
		}
	}
	
	public function qAction(pmcaiMsg $msg){
		$length = 10;//每页显示多少行
	
		if (isset($msg["?page"])){
			$page = intval($msg["?page"]);
		}else{
			$page = 1;
		}
		if($page < 1){
			$page = 1;
		}
	
		$offset = ($page - 1) * $length;
		if(!isset($msg["?q"])){
			return $this->welcomeAction($msg);
		}
		if($msg["?q"] == ""){
			return $this->welcomeAction($msg);
		}
	
		$data = $this->model->q($msg["?q"],$offset,$length);
	
		if($data->isTrue()){
				
			$this->view->setPmcaiMsg($msg);
	
			$this->view->showList($msg->getPmcaiUrl(),$this->priv->getUserInfo(),$data->return,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($data->info);;
		}
	}
	
	public function rmAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->remove(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	
	
	public function editAction(pmcaiMsg $msg){
		if($msg->isPost()){
				
			if(!isset($msg["sid"],$msg["email"],$msg["name"],$msg["phone"],$msg["avatar"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->update($msg["sid"],$msg["email"],$msg["name"],$msg["phone"],$msg["avatar"],$msg["date"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showEditSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($retR->info);;
			}
		}else{
			if(!isset($msg["?sid"])){
				$this->response->_404();
			}
			$this->view->setPmcaiMsg($msg);
			$rowR = $this->model->row(intval($msg["?sid"]));
			if(!$rowR->isTrue()){
				$this->response->_404();
			}
			$this->view->showForm($this->priv->getUserInfo(),$rowR->return);
		}
	
	}
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["email"],$msg["name"],$msg["pwd"],$msg["phone"],$msg["avatar"],$msg["rpq"],$msg["rpa"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->add($msg["email"],$msg["name"],$msg["pwd"],$msg["phone"],$msg["avatar"],$msg["rpq"],$msg["rpa"],$msg["date"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showAddSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($retR->info);
			}
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->showForm($this->priv->getUserInfo());
		}
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