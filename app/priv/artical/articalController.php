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
	public function reldocAction(pmcaiMsg $msg){
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
		
			$this->view->showListForReldoc($msg->getPmcaiUrl(),$this->priv->getUserInfo(),$data->return,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($retR->info);;
		}
	}
	public function reldisAction(pmcaiMsg $msg){
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
		$data = $this->model->q_reldis($offset,$length);
		
		if($data->isTrue()){
			
// 			var_dump($data->return);exit;
			
			$this->view->setPmcaiMsg($msg);
			
			$this->view->showListForReldis(
				$msg->getPmcaiUrl(),
				$this->priv->getUserInfo(),
				$data->return,
				$this->model->getCacheDisease(),
				$page,
				$length,
				$msg["?dc"],
				$msg["?di"],
				$msg["?q"]
			);
		}else{
			echo $data->info;exit;
			$this->response->showError($retR->info);;
		}
	}
	
	public function con_reldisAction(pmcaiMsg $msg){
		var_dump($msg->getPostData());
		if($msg->isPost()){
			//di disease category
			//ds artical id array
			if(!isset($msg["ds"],$msg["di"])){
				$this->response->_404();
			}
			$this->model->con_reldis(explode(",", $msg["ds"]), $msg["di"]);
			$this->view->showOpSucc($this->priv->getUserInfo(),"更新", $_SERVER["HTTP_REFERER"]);
		}else{
			$this->response->_404();
		}
	}
	
	// 修改已关联的病种
	public function revreldisAction(pmcaiMsg $msg){
		//GET:page dc di q
		
		
		$length = 10;//每页显示多少行
		
		if (isset($msg["?page"])){
			$page = intval($msg["?page"]);
		}else{
			$page = 1;
		}
		if($page < 1){
			$page = 1;
		}
		if(!isset($msg["?dc"]) || is_null($msg["?dc"])){
			$dc = 0;
		}else{
			$dc = intval($msg["?dc"]);
		}
		if(!isset($msg["?di"]) || is_null($msg["?di"])){
			$di = 0;
		}else{
			$di = intval($msg["?di"]);
		}
		if(!isset($msg["?q"]) || is_null($msg["?q"])){
			$q = "";
		}else{
			$q = $msg["?q"];
		}
		
		
		
		$offset = ($page - 1) * $length;
		$data = $this->model->q_revreldis($dc,$di,$q,$offset,$length);
		
		if($data->isTrue()){
				
			// 			var_dump($data->return);exit;
				
			$this->view->setPmcaiMsg($msg);
				
			$this->view->showListForRevReldis(
					$msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),
					$data->return,
					$this->model->getCacheDisease(),
					$page,
					$length,
					$msg["?dc"],
					$msg["?di"],
					$msg["?q"]
			);
		}else{
			echo $data->info;exit;
			$this->response->showError($retR->info);;
		}
	}
	
	/**
	 * 接受GET：aid,did
	 * @param pmcaiMsg $msg
	 */
	public function rmreldisAction(pmcaiMsg $msg){
		if(!isset($msg["?aid"],$msg["?did"])){
			$this->response->_404();
		}
		$ret = $this->model->disconRelDis($msg["?aid"],$msg["?did"]);
		if($ret->isTrue()){
			$this->response->redirect($_SERVER["HTTP_REFERER"]);
		}else{
			$this->response->showError($ret->info);
		}
		
	}
	
	public function ajaxQAction(pmcaiMsg $msg){
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
			$data = $this->model->getList($offset,$length);
		}else if($msg["?q"] == ""){
			$data = $this->model->getList($offset,$length);
		}else{
			$data = $this->model->choose($msg["?q"],$offset,$length);
		}
		
		$this->response->ContentType(httpResponse::CONTENT_TYPE_JSON);
		
		print json_encode($data);
		exit;
		
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