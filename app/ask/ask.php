<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once dirname(__FILE__)."/askView.php";
require_once dirname(__FILE__)."/askModel.php";
class askController{
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
	private $allowAct;
	public function __construct($info){
		$this->view = new askView();
		$this->welcome($info);
	}
	private function welcome($info){
		$this->view->lst($info);
	}

	
	
	private function _404(){
		$res = new httpResponse();
		$res->_404();
	}
// 	public function _action_not_found(pmcaiMsg $msg){
// 		$action = $msg->getAction();
// 		$data = $this->model->getRowByDiskey($action);
// 		//echo "hi";
// 		if(empty($data)){
// 			$this->response->_404();
// 		}else{
// 			//病种ID
// 			$did = $data["sid"];
			
// 			//var_dump($this->model->getArticleTag7ByDid($data["sid"]));
// 			$this->view->home($this->model);
// 		}
// 	}

}