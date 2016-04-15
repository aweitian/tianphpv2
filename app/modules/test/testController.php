<?php
/**
 * Date: 2016-04-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/test/testModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/test/testView.php';
class testController extends AppController{
	/**
	 * 
	 * @var testModel
	 */
	private $model;
	/**
	 * 
	 * @var testView
	 */
	private $view;
	public function __construct(){
		$this->model = new testModel();
		$this->view = new testView();
	}
	public function welcomeAction(){
		$k = $this->model->test();
		echo "ok";
	}
}