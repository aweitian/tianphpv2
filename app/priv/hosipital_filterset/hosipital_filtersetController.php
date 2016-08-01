<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/hosipital_filterset/hosipital_filtersetModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/hosipital_filterset/hosipital_filtersetView.php';
class hosipital_filtersetController extends privController{
	/**
	 * 
	 * @var hosipital_filtersetModel
	 */
	private $model;
	/**
	 * 
	 * @var hosipital_filtersetView
	 */
	private $view;
	public function __construct(){
		$this->model = new hosipital_filtersetModel();
		$this->view = new hosipital_filtersetView();
		$this->checkPriv();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		if(!isset($msg["?hid"])){
			$this->response->_404();
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->hosipital_filterset(
				$this->priv->getUserInfo(),$msg,$this->model);
	}
	public function assignAction(pmcaiMsg $msg){
		if($msg->isPost()){
			//insert
			$ret = $this->model->add($msg["fsid"],$msg["hid"]);
			if($ret->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showOpSucc($this->priv->getUserInfo(),"添加",$ret_url);
			}else{
				$this->response->showError($ret->info);
			}
			
			
			
		}
		
		
		
		if(!isset($msg["?hid"],$msg["?m"])){
			$this->response->_404();
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->form(
				$this->priv->getUserInfo(),$msg,$this->model);
	}
	
	
	public function reassignAction(pmcaiMsg $msg){
		if($msg->isPost()){
			//insert
			$ret = $this->model->update($msg["hid"],$msg["fsid"],$msg["oldfsid"]);
			if($ret->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showOpSucc($this->priv->getUserInfo(),"编辑",$ret_url);
			}else{
				$this->response->showError($ret->info);
			}
		}
		
		
		
		if(!isset($msg["?hid"],$msg["?m"])){
			$this->response->_404();
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->form(
				$this->priv->getUserInfo(),$msg,$this->model);
	}
	
	public function rmAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?hid"],$msg["?m"])){
			$this->response->_404();
		}
		$this->model->rm(intval($msg["?hid"]),intval($msg["?m"]));
		$this->response->redirect($ret_url);
	}
}