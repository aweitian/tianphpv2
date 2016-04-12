<?php
/**
 * Date: {date}
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/{name}/{name}Model.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/{name}/{name}View.php';
class {name}Controller extends AppController{
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
	}
	public function welcomeAction(){

	}
}