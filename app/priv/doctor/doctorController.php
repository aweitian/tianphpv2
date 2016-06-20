<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/utility/pagination.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorView.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctor_lv_validator.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorValidator.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/doctor/doctorFilter.php';
class doctorController extends privController{
	/**
	 * 
	 * @var doctorModel
	 */
	private $model;
	/**
	 * 
	 * @var doctorView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new doctorModel();
		$this->view = new doctorView();
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
		$data = $this->model->getList($offset,$length);
		if($data->isTrue()){
			$this->view->setPmcaiMsg($msg);
			$this->view->showList(
				$msg->getPmcaiUrl(),
				$this->priv->getUserInfo(),
				$data->return,
				$page,
				$length,
				$msg["?r"],
				$msg["?q"],
				$msg["?msg"],
				$msg["?from"]
			);
		}else{
			$this->response->showError($retR->info);;
		}
	}
	
	
	public function revrellvAction(pmcaiMsg $msg){
		$data = $this->model->getCacheDocInfo();
		

		$this->view->setPmcaiMsg($msg);
	
		$this->view->showListForRevLv(
				$msg->getPmcaiUrl(),
				$this->priv->getUserInfo(),
				$data,
				$this->model->doctor_lv_all()
		);

		
	}
	public function con_rellvAction(pmcaiMsg $msg){
		//di 3
		//ds 3,4,7,8,9,10
		if(!$msg->isPost()){
			$this->response->_404();
		}
		//var_dump($msg->getPostData());
		$dsArr = explode(",", $msg["ds"]);
		$dlv    = $msg["di"];
		foreach ($dsArr as $dod){
			$this->model->connectLv($dod, $dlv);
		}		
		$this->response->redirect($_SERVER["HTTP_REFERER"]);
		
	}
	
	public function resetlvAction(pmcaiMsg $msg){
		//var_dump($msg->getPostData());
		if(!$msg->isPost()){
			$this->response->_404();
		}
		//["sid"]=> string(1) "1" ["lv"]=> string(1) "3"
		$this->model->updateLv($msg["sid"], $msg["lv"]);
		$this->response->redirect($_SERVER["HTTP_REFERER"]);
	}
	
	
	public function rellvAction(pmcaiMsg $msg){
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
		$data = $this->model->q_relart($offset,$length);
	
		if($data->isTrue()){
				
			// 			var_dump($data->return);exit;
				
			$this->view->setPmcaiMsg($msg);
				
			$this->view->showListForRellv(
					$msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),
					$data->return,
					$this->model->doctor_lv_all()->return,
					$page,
					$length,
					$msg["?q"]
			);
		}else{
			echo $data->info;exit;
			$this->response->showError($retR->info);;
		}
	}
	
	public function relarticalAction(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showRelArtical(
			$this->priv->getUserInfo(),
			$this->model->getCacheDisease()
		);
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
			$this->view->showList(
					$msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),
					$data->return,
					$page,
					$length,
					$msg["?r"],
					$msg["?q"],
					$msg["?msg"]
			);
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
				
			if(!isset($msg["sid"],$msg["id"],$msg["name"],$msg["avatar"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->update($msg["sid"],$msg["id"],$msg["name"],$msg["avatar"],$msg["date"]);
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
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["id"],$msg["name"],$msg["pwd"],$msg["avatar"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->add($msg["id"],$msg["name"],$msg["pwd"],$msg["avatar"],$msg["date"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$url = new pmcaiUrl($msg["?returl"]);
					$url->setQuery("from", "add");
					$ret_url = $url->getUrl();
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function forceresetpwdAction(pmcaiMsg $msg){
	
		if($msg->isPost()){
			if(!isset($msg["sid"],$msg["pwd"])){
				$this->response->_404();
			}
			$retR = $this->model->forceResetPwd($msg["sid"],$msg["pwd"]);
			if($retR->isTrue()){
				$url = new pmcaiUrl($_SERVER["HTTP_REFERER"]);
				$url->setQuery("msg", "密码重置成功");
				$url->setQuery("r", 1);
				$url->setQuery("from", "frpw");
				//url($_SERVER["HTTP_REFERER"]);
				$this->response->redirect($url->getUrl());
				exit;
			}else{
				$this->response->showError($retR->info);;
			}
		}
		$this->response->_404();
	}
	
	
	
	
	
	
	
	public function editlvAction(pmcaiMsg $msg){
		if(!$msg->isPost()){
			$this->response->_404();
		}
		if(!isset($msg["data"],$msg["sid"])){
			$this->response->_404();
		}
		$retR = $this->model->doctor_lv_update($msg["sid"],$msg["data"]);
		if($retR->isTrue()){
			$this->response->go("/priv/doctor/lv");
		}else{
			$this->response->showError($retR->info);
		}
	}
	public function rmlvAction(pmcaiMsg $msg){
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$retR = $this->model->doctor_lv_remove($msg["?sid"]);
		if($retR->isTrue()){
			$this->response->go("/priv/doctor/lv");
		}else{
			$this->response->go("/priv/doctor/lv?err=".urlencode($retR->info));
		}
	}
	public function addlvAction(pmcaiMsg $msg){
		if(!$msg->isPost()){
			$this->response->_404();
		}
		if(!isset($msg["data"])){
			$this->response->_404();
		}
		$retR = $this->model->doctor_lv_add($msg["data"]);
		if($retR->isTrue()){
			$this->response->go("/priv/doctor/lv");
		}else{
			$this->response->go("/priv/doctor/lv?err=".urlencode($retR->info));
		}
	}
	public function lvAction(pmcaiMsg $msg){
		$dataRet = $this->model->doctor_lv_all();
		if(!$dataRet->isTrue()){
			$this->response->showError($dataRet->info);
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->showDoctorLvList($this->priv->getUserInfo(), $dataRet->return,$msg["?err"]);
	}
}