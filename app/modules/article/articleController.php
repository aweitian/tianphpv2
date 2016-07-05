<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/article/articleView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/article/articleModel.php";
class articleController extends appCtrl{
	/**
	 *
	 * @var articleModel
	 */
	private $model;
	/**
	 *
	 * @var articleView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new articleModel();
		$this->view = new articleView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->article($this->model);
	}
}