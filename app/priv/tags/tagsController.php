<?php
/**
 * Date: 2016-06-18
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/tags/tagsModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/tags/tagsView.php';
class tagsController extends privController{
	/**
	 * 
	 * @var tagsModel
	 */
	private $model;
	/**
	 * 
	 * @var tagsView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new tagsModel();
		$this->view = new tagsView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		echo "tags";
	}
}