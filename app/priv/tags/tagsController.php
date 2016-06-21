<?php
/**
 * Date: 2016-06-18
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/tags/tagsModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/tags/tagsView.php';
class tagsController extends privController{
	/**
	 * 
	 * @var tagsModel
	 */
	private $model;
	/**
	 * 
	 * @var tagsView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new tagsModel();
		$this->view = new tagsView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		echo "tags";
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