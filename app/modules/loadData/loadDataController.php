<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataView.php';
class loadDataController extends AppController{
	/**
	 * 
	 * @var loadDataModel
	 */
	private $model;
	/**
	 * 
	 * @var loadDataView
	 */
	private $view;
	public function __construct(){
		$this->model = new loadDataModel();
		$this->view = new loadDataView();
	}
	public function welcomeAction(){

	}
}