<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/disease/diseaseView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/disease/diseaseModel.php";
class diseaseController extends appCtrl implements IActionNotFound{
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
		$this->model = new diseaseModel();
		$this->view = new diseaseView();
		$this->initHttpResponse();
	}
	public function _action_not_found(pmcaiMsg $msg){
		$action = $msg->getAction();
		$data = $this->model->getRowByDiskey($action);
		//echo "hi";
		if(empty($data)){
			$this->response->_404();
		}else{
			//病种ID
			$did = $data["sid"];
			
			var_dump($this->model->getArticalTag7ByDid($data["sid"]));
		}
	}
	public function welcomeAction(){
		$this->view->disease($this->model);
	}
}