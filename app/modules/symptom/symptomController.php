<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/app/modules/symptom/symptomView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/symptom/symptomModel.php";
class symptomController extends appCtrl{
	/**
	 *
	 * @var symptomModel
	 */
	private $model;
	/**
	 *
	 * @var symptomView
	 */
	private $view;
	
	public function __construct(){
		$this->model = new symptomModel();
		$this->view = new symptomView();
	}
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		$this->view->symptom($this->model);
	}
}