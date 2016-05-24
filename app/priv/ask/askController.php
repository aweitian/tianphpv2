<?php
/**
 * Date: 2016-05-21
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/utility/pagination.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/ask/askModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/ask/askView.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/ask/askValidator.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/ask/askFilter.php';
class askController extends privController{
	/**
	 * 
	 * @var askModel
	 */
	private $model;
	/**
	 * 
	 * @var askView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new askModel();
		$this->view = new askView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		if(!isset($msg["?uid"])){
			$this->response->_404();
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->showForm(
			$this->priv->getUserInfo(),
			$msg["?uid"],
			$this->model->getAllDoc(),
			$this->model->getAllDis()
		);
	}
	/**
	 * @param pmcaiMsg $msg
	 */
	public function qAction(pmcaiMsg $msg){
		if(!isset($msg["?uid"])){
			$this->response->_404();
		}
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
		$data = $this->model->getAllAskByUid($msg["?uid"], $offset, $length);
		
// 		var_dump($data->return);exit;
		
		
		$this->view->setPmcaiMsg($msg);
		$this->view->showUidList(
			$msg->getPmcaiUrl(),
			$this->priv->getUserInfo(),
			$data->info,
			$data->return,
			$page,
			$length,
			$msg["?q"]
		);
	}
	
	//显示查询用户UI
	public function usrAction(pmcaiMsg $msg){
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
		
		$ret = $this->model->queryUsr($msg["?q"], $offset, $length);
			
		if($ret->isTrue()){
			$this->view->setPmcaiMsg($msg);
			$this->view->showUsrList(
					"/priv/ask",
					$msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),
					$ret->info,
					$ret->return,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($ret->info);;
		}
	}
	public function usrecAction(pmcaiMsg $msg){
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
		
		$ret = $this->model->queryUsr($msg["?q"], $offset, $length);
			
		if($ret->isTrue()){
			$this->view->setPmcaiMsg($msg);
			$this->view->showUsrList(
					"/priv/ask/q",
					$msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),
					$ret->info,
					$ret->return,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($ret->info);;
		}
	}
	
	
	
	public function addAction(pmcaiMsg $msg){
		$this->chkPost($msg, array("uid","dod","title","did","desc","svr","date"));

		if(!isset($msg["files"])){
			$files = array();
		}else{
			$files = $msg["files"];
		}
		$ret = $this->model->add($msg["uid"], $msg["dod"], $msg["title"],
				 $msg["did"], $msg["desc"], $msg["svr"], $files, $msg["date"]);
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
	
	
}