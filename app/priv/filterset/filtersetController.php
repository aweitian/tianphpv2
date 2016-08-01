<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/filterset/filtersetModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/filterset/filtersetView.php';
class filtersetController extends privController{
	/**
	 * 
	 * @var filtersetModel
	 */
	private $model;
	/**
	 * 
	 * @var filtersetView
	 */
	private $view;
	public function __construct(){
		$this->model = new filtersetModel();
		$this->view = new filtersetView();
		$this->checkPriv();
		$this->initHttpResponse();
	}

	public function welcomeAction(pmcaiMsg $msg){
		//目前按META来限制DATA树的深度
		if(!isset($msg["?mid"])){
			$this->response->_404();
		}
		if(isset($msg["?pid"])){
			$pid = intval($msg["?pid"]);
		}else{
			$pid = 0;
		}
		
		$this->view->setPmcaiMsg($msg);
		$this->view->showList($this->priv->getUserInfo(),$msg,$this->model);
		
		
	}
	
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			//insert
			$ret = $this->model->add($msg["pid"],$msg["mid"],$msg["name"], $msg["url"], $msg["order"]);
			if($ret->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showAddSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($ret->info);
			}
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->showFormUI($this->priv->getUserInfo(), $msg,$this->model);
		}
	}
	
	public function rmAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->rm(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
}