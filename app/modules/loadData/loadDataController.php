<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataView.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/csvFormat.php';
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
		parent::__construct();
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

// 		$gbk = file_get_contents("uploads/1460546321");
// 		echo iconv("GBK", "UTF-8", $gbk);
// 		exit;
		if(isset($_FILES) && isset($_FILES["csv"]) && $msg->isPost()){
			$ret = $this->model->mvFIleToUploads($_FILES["csv"]);
			if($ret->isTrue()){
				$path = $ret->return;
				$csv = new csvFormat();
				$r = $csv->parse($path);
				if($r->isTrue()){
					$ret = $this->model->saveUploadInfo(
						$r->return["token"], 
						$r->return["channel"], 
						$r->return["channel"], 
						$r->return["device"], 
						$r->return["path"], 
						$r->return["total"]
					);
					if($ret == 0){
						$r = new rirResult(1,"保存到LOG表时失败") ;
					}
				}
				$this->view->setPmcaiMsg($msg);
				$this->view->showUploadResult($r,$msg->getPmcaiUrl()->setAction("load")->getUrl());
			}
		}else{
			$this->showFormUI($msg);
		}
		
	}
	public function loadAction(pmcaiMsg $msg){
		if(!isset($msg["token"])){
			$this->response->_404();
		}
		$data = $this->model->getUploadInfo($msg["token"]);
		if(empty($data)){
			$this->response->showError("无效的文件HASH值");
		}
		$this->view->setPmcaiMsg($msg);
		$this->view->showLoadDataPre($data["cnt"]);
		$this->model->setCallback(array($this,"loadDataProcessingCallback"));
		$this->model->loadData($data);
	}
	public function loadDataProcessingCallback($pos,rirResult $ret){
		$this->view->showLoadDataProcessing($pos, $ret);
	}
	private function showFormUI(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showFormUI($msg->getPmcaiUrl()->getUrl());
	}
}