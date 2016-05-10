<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/disease/diseaseModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/disease/diseaseView.php';

require_once FILE_SYSTEM_ENTRY.'/app/utility/tabDataToArray.php';
class diseaseController extends privController{
	/**
	 * 
	 * @var diseaseModel
	 */
	private $model;
	/**
	 * 
	 * @var diseaseView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new diseaseModel();
		$this->view = new diseaseView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){

	}
	
	public function importAction(pmcaiMsg $msg){
		if($msg->isPost()){
			echo $this->response->utf8Header();
			$demo = new tabDataToArray($msg["data"]);
			$ret = $demo->parse();
			if($ret->isTrue()){
				
				$this->model->import($ret->return);
			}else{
				$this->response->showError($ret->info);
			}
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->import($this->priv->getUserInfo());
		}
	}
	
	
}