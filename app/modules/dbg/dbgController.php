<?php
/**
 * Date: 2016-04-11
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/dbg/dbgModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/dbg/dbgView.php';
class dbgController extends Controller{
	/**
	 * 
	 * @var dbgModel
	 */
	private $model;
	/**
	 * 
	 * @var dbgView
	 */
	private $view;
	public function __construct(){
		$this->model = new dbgModel();
		$this->view = new dbgView();
	}
	public function welcomeAction(){
		var_dump("def/dbg/main");
	}
	public function xxAction(){
		var_dump($this->model->test());
	}
}