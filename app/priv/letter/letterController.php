<?php
/**
 * Date: 2016-05-14
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/letter/letterModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/letter/letterView.php';

class letterController extends privController{
	/**
	 * 
	 * @var letterModel
	 */
	private $model;
	/**
	 * 
	 * @var letterView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new letterModel();
		$this->view = new letterView();
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
		
		$dataRet = $this->model->getAll($offset, $length);
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
			if(!isset($msg["sid"],$msg["uid"],$msg["dod"],$msg["did"],$msg["content"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->update($msg["sid"],$msg["uid"],$msg["dod"],$msg["did"],$msg["content"],$msg["date"]);
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
			$this->view->showForm(
				$this->priv->getUserInfo(),
				$this->model->getWaterArm(),
				$this->model->getInfo_doctor(),
				$this->model->getDisLv0(),
				$this->model->row(intval($msg["?sid"]))
			);
		}
	}
	
	public function verifyAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->verify(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
		
	}
	
	
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["uid"],$msg["dod"],$msg["did"],$msg["content"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->add($msg["uid"],$msg["dod"],$msg["did"],$msg["content"],$msg["date"]);
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
			$usr = $this->model->getWaterArm();
			$doc = $this->model->getInfo_doctor();
			$dis = $this->model->getDisLv0();
			
			$this->view->setPmcaiMsg($msg);
			$this->view->showForm($this->priv->getUserInfo(),$usr,$doc,$dis);
		}
	}
}