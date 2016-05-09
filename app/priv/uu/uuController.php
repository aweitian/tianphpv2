<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/uu/uuModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/uu/uuView.php';
class uuController extends privController{
	/**
	 * 
	 * @var uuModel
	 */
	private $model;
	/**
	 * 
	 * @var uuView
	 */
	private $view;
	public function __construct(){
		$this->model = new uuModel();
		$this->view = new uuView();
	}
	public function welcomeAction(){

	}
}