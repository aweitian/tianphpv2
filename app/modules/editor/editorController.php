<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/editor/editorView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/editor/editorModel.php";
class editorController extends appCtrl{
	/**
	 *
	 * @var editorModel
	 */
	private $model;
	/**
	 *
	 * @var editorView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new editorModel();
		$this->view = new editorView();
	}
	public function welcomeAction(pmcaiMsg $msg){
		$this->view->editor($this->model);
	}
	public function uploadAction(pmcaiMsg $msg){
		uploadFactory::getInstance()->upload();
		
	}
}