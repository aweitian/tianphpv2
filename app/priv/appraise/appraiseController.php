<?php
/**
 * Date: 2016-05-14
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/appraise/appraiseModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/appraise/appraiseView.php';

class appraiseController extends privController{
	/**
	 * 
	 * @var appraiseModel
	 */
	private $model;
	/**
	 * 
	 * @var appraiseView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new appraiseModel();
		$this->view = new appraiseView();
		$this->view->model = $this->model;
		$this->initHttpResponse();
	}

	
	public function welcomeAction(pmcaiMsg $msg){
		
		$this->view->setPmcaiMsg($msg);
		$this->view->showList($this->priv->getUserInfo(),$msg["?err"]);
	}

	public function rmAction(pmcaiMsg $msg){
		if (isset ( $_SERVER ["HTTP_REFERER"] ))
			$ret_url = $_SERVER ["HTTP_REFERER"];
		else
			$ret_url = AppUrl::userAppraise ();
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->remove(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	
	
	public function editAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["sid"],$msg["uid"],$msg["did"],$msg["dod"],$msg["txt"],$msg["lv"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->update($msg["sid"],$msg["uid"],$msg["did"],$msg["dod"],$msg["txt"],$msg["lv"],$msg["date"]);
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
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["uid"],$msg["did"],$msg["dod"],$msg["txt"],$msg["lv"],$msg["date"])){
				$this->response->_404();
			}
			//$uid,$did,$dod,$txt,$lv,$date
			$retR = $this->model->add($msg["uid"],$msg["did"],$msg["dod"],$msg["txt"],$msg["lv"],$msg["date"]);
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