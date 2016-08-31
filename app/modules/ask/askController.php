<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/ask/askView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/ask/askModel.php";
class askController extends appCtrl implements IActionNotFound{
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
		$this->model = new askModel();
		$this->view = new askView();
	}
	public function welcomeAction(){
		$this->view->ask($this->model);
	}
	public function _action_not_found(pmcaiMsg $msg){
		$lv0Dis = $this->model->getLv0();
		if (array_key_exists($msg->getAction(), $lv0Dis)){
			$this->lv0handle($lv0Dis[$msg->getAction()], $msg);
		} else {
			$this->_404();
		}
	}
	
	private function _404(){
		$re = new httpResponse();
		$re->_404();
	}
	
	private function lv0handle($row,$msg){
		$this->model->data = $row;
// 		var_dump($row);
		$this->view->lv0($this->model);
	}
}