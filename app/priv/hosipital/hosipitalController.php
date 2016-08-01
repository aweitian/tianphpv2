<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/hosipital/hosipitalModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/hosipital/hosipitalView.php';
class hosipitalController extends privController{
	/**
	 * 
	 * @var hosipitalModel
	 */
	private $model;
	/**
	 * 
	 * @var hosipitalView
	 */
	private $view;
	public function __construct(){
		$this->model = new hosipitalModel();
		$this->view = new hosipitalView();
		$this->checkPriv();
	}
	public function welcomeAction(pmcaiMsg $msg){

		$data = $this->model->getAll();
		if($data->isTrue()){
			$this->view->setPmcaiMsg($msg);
			$this->view->showList(
					
					$this->priv->getUserInfo(),
					$data->return
					
			);
		}else{
			$this->response->showError($retR->info);
		}
	}
	
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["text"])){
				$this->response->_404();
			}
			$retR = $this->model->add($msg["text"]);
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
			
// 			$usr = $this->model->getWaterArm();
// 			$doc = $this->model->getInfo_doctor();
// 			$dis = $this->model->getDisLv0();
				
			$this->view->setPmcaiMsg($msg);
			$this->view->showForm($this->priv->getUserInfo());
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
	
			if(!isset($msg["sid"],$msg["text"])){
				$this->response->_404();
			}
			$retR = $this->model->update($msg["sid"],$msg["text"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$url = new pmcaiUrl($msg["?returl"]);
					$url->setQuery("from", "edit");
					$ret_url = $url->getUrl();
				}else{
					$ret_url = "";
				}
				$this->view->showOpSucc($this->priv->getUserInfo(),"更新",$ret_url);
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
}