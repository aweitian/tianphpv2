<?php
/**
 * Date: {date}
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/{name}/model.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/{name}/view.php';
class {name}Controller extends Controller{
	/**
	 * 
	 * @var {name}Model
	 */
	private $model;
	/**
	 * 
	 * @var {name}View
	 */
	private $view;
	public function __construct(){
		$this->model = new {name}Model();
		$this->view = new {name}View();
		$this->view->wrap($this->model->test())->show();
	}
	public function welcomeAction(){

	}
}