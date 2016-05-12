<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/utility/pagination.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/artical/articalModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/artical/articalView.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/artical/artical_validator.php';


class articalController extends privController{
	/**
	 * 
	 * @var articalModel
	 */
	private $model;
	/**
	 * 
	 * @var articalView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new articalModel();
		$this->view = new articalView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
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
		$data = $this->model->getList($offset,$length);
		
		if($data->isTrue()){
			
			$this->view->setPmcaiMsg($msg);
		
			$this->view->showList($msg->getPmcaiUrl(),$this->priv->getUserInfo(),$data->return,$page,$length,$msg["?q"]);
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
			$this->response->showError($retR->info);;
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
			if(!isset($msg["sid"],$msg["title"],$msg["content"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->update($msg["sid"],$msg["title"],$msg["content"],$msg["date"]);
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
			if(!isset($msg["title"],$msg["content"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->add($msg["title"],$msg["content"],$msg["date"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showAddSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($retR->info);;
			}
			
			
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->showForm($this->priv->getUserInfo());			
		}

	}
}