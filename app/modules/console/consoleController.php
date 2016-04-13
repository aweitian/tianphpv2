<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/console/consoleModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/console/consoleView.php';
class consoleController extends AppController{
	/**
	 * 
	 * @var consoleModel
	 */
	private $model;
	/**
	 * 
	 * @var consoleView
	 */
	private $view;
	public function __construct(){
		$this->model = new consoleModel();
		$this->view = new consoleView();
	}
	public function welcomeAction(){

	}
}