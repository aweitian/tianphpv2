<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/tree/treeModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/tree/treeView.php';
class treeController extends privController{
	/**
	 * 
	 * @var treeModel
	 */
	private $model;
	/**
	 * 
	 * @var treeView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new treeModel();
		$this->view = new treeView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		//目前按META来限制DATA树的深度
		
		if(isset($msg["?pid"])){
			$pid = intval($msg["?pid"]);
		}else{
			$pid = 0;
		}
		
		
		$data = $this->model->getChildren($pid);
		$path = $this->model->path($pid);
// 		var_dump($data);exit;
		$this->view->setPmcaiMsg($msg);
		$this->view->showList($this->priv->getUserInfo(),$pid,$path,$data);
		
		
	}
	
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			//insert
			$ret = $this->model->add($msg["pid"],$msg["name"], $msg["url"], $msg["order"]);
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
			if(!isset($msg["?pid"])){
				$pid = 0;
				$lv = 0;
			}else{
				$pid = intval($msg["?pid"]);
			}
	
			$this->view->setPmcaiMsg($msg);
			$this->view->showFormUI($this->priv->getUserInfo(), $pid);
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