<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/hosipital_filter/hosipital_filterModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/hosipital_filter/hosipital_filterView.php';
class hosipital_filterController extends privController{
	/**
	 * 
	 * @var hosipital_filterModel
	 */
	private $model;
	/**
	 * 
	 * @var hosipital_filterView
	 */
	private $view;
	public function __construct(){
		$this->model = new hosipital_filterModel();
		$this->view = new hosipital_filterView();
		$this->checkPriv();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		
		if($msg->isPost()){
			
			$data = $msg->getPostData();
			
			$data = $data["m"];
			$this->model->search($data);
			exit;
		}
		
		$this->view->setPmcaiMsg($msg);
		$this->view->showUI($this->priv->getUserInfo(),$this->model,$msg);
	}
}