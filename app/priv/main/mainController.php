<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/main/mainModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/main/mainView.php';
class mainController extends privController{
	/**
	 * 
	 * @var mainModel
	 */
	private $model;
	/**
	 * 
	 * @var mainView
	 */
	private $view;
	public function __construct(){
		$this->model = new mainModel();
		$this->view = new mainView();
		$this->checkPriv();
	}
	public function welcomeAction(){
		$this->view->main($this->priv->getUserInfo(),"welcome");
	}
}