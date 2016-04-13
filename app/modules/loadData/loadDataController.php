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
	public function welcomeAction(pmcaiMsg $msg){
// 		array(1) { 
// 			["file"]=> array(5) { 
// 				["name"]=> string(46) "chuangyi计算机_20160328-20160328_134891.csv" 
// 				["type"]=> string(24) "application/octet-stream" 
// 				["tmp_name"]=> string(14) "/tmp/php2rQEVg" 
// 				["error"]=> int(0) 
//				["size"]=> int(2932781) 
// 			}
// 		}
// 		array(1) { 
// 			["file"]=> array(5) { 
// 				["name"]=> string(43) "chuangyiç§»åŠ¨_20160328-20160328_187493.csv" 
// 				["type"]=> string(0) "" 
// 				["tmp_name"]=> string(0) "" 
// 				["error"]=> int(1) 
// 				["size"]=> int(0) 
// 			} 
// 		}
		if(isset($_FILES) && $msg->isPost()){
			var_dump($_FILES);
		}else{
			$this->showFormUI($msg);
		}
		
	}
	private function showFormUI(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showFormUI($msg->getPmcaiUrl()->getUrl());
	}
}