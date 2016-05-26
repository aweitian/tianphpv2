<?php
/**
 * Date: 2016-05-14
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/present/presentModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/present/presentView.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/present/presentValidator.php';

class presentController extends privController{
	/**
	 * 
	 * @var presentModel
	 */
	private $model;
	/**
	 * 
	 * @var presentView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new presentModel();
		$this->view = new presentView();
		$this->initHttpResponse();
	}
	
	public function givePresentAction(pmcaiMsg $msg){
		
	}
	
	
	
	
	public function welcomeAction(pmcaiMsg $msg){
		$dataRet = $this->model->all();
		if(!$dataRet->isTrue()){
			$this->response->showError($dataRet->info);
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->showList($this->priv->getUserInfo(), $dataRet->return,$msg["?err"]);
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
				
			if(!isset($msg["sid"],$msg["cost"],$msg["data"],$msg["ben"],$msg["avatar"])){
				$this->response->_404();
			}
			$retR = $this->model->update($msg["sid"],$msg["data"],$msg["cost"],$msg["ben"],$msg["avatar"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showOpSucc($this->priv->getUserInfo(),"编辑",$ret_url);
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
			if(!isset($msg["cost"],$msg["data"],$msg["ben"],$msg["avatar"])){
				$this->response->_404();
			}
			$retR = $this->model->add($msg["data"],$msg["cost"],$msg["ben"],$msg["avatar"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showOpSucc($this->priv->getUserInfo(),"添加",$ret_url);
			}else{
				$this->response->showError($retR->info);
			}
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->showForm($this->priv->getUserInfo());
		}
	}
}