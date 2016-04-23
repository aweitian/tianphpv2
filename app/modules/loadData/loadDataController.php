<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataView.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/csvFormat.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/csvChannelFormat.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/csvPrivFormat.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/csvFormatDetector.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataValidator.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataFilter.php';

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
				
				
				$csvDet = new csvFormatDetector($path);
				
				$csvDet->search();
				
				if($csvDet->match()){
					$token = md5('shbdata'.$path.time());
					if($csvDet->getCsvType() == csvFormat::CSV_TYPE_PUB){
						$csvFor = $csvDet->getCsvChananelFormat();
						$ret = $this->model->saveUploadInfo(
							$token,
							$csvDet->getSelectedCls(),
							$csvFor->getDevType(),
							$path,
							$csvFor->getDataRows()
						);
						if($ret == 0){
							//exit($this->model->);
						}
					}else{
						$csvFor = $csvDet->getCsvPrivFormat();
						$ret = $this->model->saveUploadInfo(
								$token,
								$csvDet->getSelectedCls(),
								csvFormat::CSV_DEV_PRIV,
								$path,
								$csvFor->getDataRows()
						);
					}
					if($ret == 0){
						$r = new rirResult(1,"保存到LOG表时失败") ;
					}else{
						$data = $csvFor->isUploaded($path);
						if(!empty($data)){
							$info = "你的文件数据可能在 [".$data["date"]."] 已经导入到数据库中，请确认.";
						}else{
							$info = "";
						}
						$r = new rirResult(0,$info,array(
							"token" => $token,
							"dn" => $csvFor->getDisplayName(),
							"path" => $path,
							"total" => $csvFor->getDataRows()
						));
					}
				}else{
					$r = new rirResult(2,"未能识别的格式") ;
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
	public function loadDataProcessingCallback($pos,$app,$upd){
		$this->view->showLoadDataProcessing($pos,$app,$upd);
	}
	private function showFormUI(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showFormUI($msg->getPmcaiUrl()->getUrl());
	}
}