<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/filter/filterModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/filter/filterView.php';
class filterController extends privController{
	/**
	 * 
	 * @var filterModel
	 */
	private $model;
	/**
	 * 
	 * @var filterView
	 */
	private $view;
	public function __construct(){
		$this->model = new filterModel();
		$this->view = new filterView();
		$this->checkPriv();
		$this->initHttpResponse();
		
	}
	public function welcomeAction(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showList(
			$this->priv->getUserInfo(),
			$this->model
		);
	}
	public function addAction(pmcaiMsg $msg){
		if ($msg->isPost()){
			if($msg["?returl"]){
				$ret_url = $msg["?returl"];
			}else{
				$ret_url = "";
			}
			if(isset($msg["type"]) && $msg["type"] == "likestr"){
				if ($msg["data"] == ""){
					$this->view->showOpResult($this->priv->getUserInfo(),"至少要选中一个字段",$ret_url);
				}else if(is_array($msg["data"])){
					$msg["data"] = join(",", $msg["data"]);
				}else{
					$this->view->showOpResult($this->priv->getUserInfo(),"不能识别的DATA数据",$ret_url);
					
				}
			}
			if (!isset($msg["type"],$msg["data"],$msg["order"])){
				$this->response->_404();
			}
			$ret = $this->model->add($msg["type"],$msg["data"],$msg["order"]);
			
			if($ret->isTrue()){
				$this->view->showOpResult($this->priv->getUserInfo(),"添加成功",$ret_url);
			}else{
				$this->view->showOpResult($this->priv->getUserInfo(),$ret->info,$ret_url);
			}
		}
		
		$this->view->setPmcaiMsg($msg);
		$this->view->showForm(
				$this->priv->getUserInfo(),
				$this->model
		);

	}
	public function rmAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->rm(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	public function toggleAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->toggleEnabled(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	
	
	
	public function editAction(pmcaiMsg $msg){
		if ($msg->isPost()){
			if($msg["?returl"]){
				$ret_url = $msg["?returl"];
			}else{
				$ret_url = "";
			}
			
			if(!isset($msg["data"])){
				$this->view->showOpResult($this->priv->getUserInfo(), "DATA数据为空", $ret_url);
			}
			if (!isset($msg["sid"],$msg["data"],$msg["order"])){
				$this->response->_404();
			}
			
			
			if(isset($msg["data"]) && is_array($msg["data"])){
				$msg["data"] = join(",", $msg["data"]);
			}
			
			$ret = $this->model->update($msg["sid"],$msg["data"],$msg["order"]);
			
			if($ret->isTrue()){
				$this->view->showOpResult($this->priv->getUserInfo(),"更新成功",$ret_url);
			}else{
				$this->view->showOpResult($this->priv->getUserInfo(),$ret->info,$ret_url);
			}
		}
		
		$this->view->setPmcaiMsg($msg);
		$this->view->showForm(
				$this->priv->getUserInfo(),
				$this->model,
				"edit"
		);

	}
}