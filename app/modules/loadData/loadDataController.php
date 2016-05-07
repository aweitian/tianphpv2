<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
//load model and view
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/loadDataView.php';

//load format
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/format/csvFormat.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/format/csvPrivFormat.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/format/csvPubFormat.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/format/csvRelIdeaFormat.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/loadData/format/csvRelUnitFormat.php';

//load detector validator and filter
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
					$csvFor = $csvDet->getCsvFormat();
					$ret = $this->model->saveUploadInfo(
							$token,
							$csvDet->getSelectedCls(),
							$path,
							$csvFor->getDataRows()
						);
					
					if($ret == 0){
						$r = new rirResult(1,"保存到LOG表时失败") ;
					}else{
						$data = $this->model->isUploaded($path);
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
	
	
	public function saveAction(pmcaiMsg $msg){
		if(!isset($msg["type"])){
			$this->response->_404();
		}
		switch ($msg["type"]){
			case "pub":
				$ret = $this->model->savePubCache2Db();
				if($ret->isTrue()){
					$this->model->clearPubCache();
					$this->view->setPmcaiMsg($msg);
					$this->view->showInfo("保存成功");
				}else{
					$this->response->showError("保存失败:".$ret->info);
				}
				break;
			case "priv":
				$ret = $this->model->savePrivCache2Db();
				if($ret->isTrue()){
					$this->model->clearPrivCache();
					$this->view->setPmcaiMsg($msg);
					$this->view->showInfo("保存成功");
				}else{
					$this->response->showError("保存失败:".$ret->info);
				}
				break;
			default:
				$this->response->_404();
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
		
		$cls = $data["cls"];
		$path = $data["name"];
		
		if(!preg_match("/^\w+$/", $cls)){
			$this->response->showError("CLASS 字段值不合法");
			return ;
		}
		if(!class_exists($cls)){
			$cls_path = FILE_SYSTEM_ENTRY."/app/modules/loadData/format/csv/".$cls.".php";
			if(!file_exists($cls_path)){
				$this->response->showError("illegal class in database");
				return ;
			}else{
				require $cls_path;
			}
		}
		$this->view->setPmcaiMsg($msg);
		$this->model->setCallback(array($this,"loadDataProcessingCallback"));
		$rc = new ReflectionClass($cls);
		if($rc->isSubclassOf("csvPrivFormat")){
			//csvPrivFormat
			$this->view->showLoadDataPre($data["cnt"],"priv");
			$ret = $this->model->loadPrivDataToCache($rc->newInstance($path));
			if($ret){
				$this->doneCallback();
			}
		}else if($rc->isSubclassOf("csvPubFormat")){
			//csvPubFormat
			$this->view->showLoadDataPre($data["cnt"],"pub");
			$ret = $this->model->loadPubDataToCache($rc->newInstance($path));
			if($ret){
				$this->doneCallback();
			}	
		}else if($rc->isSubclassOf("csvRelIdeaFormat")){
			//csvRelIdeaFormat
			$this->view->showLoadDataPre($data["cnt"],"relid");
			$ret = $this->model->updateRelForIdea($rc->newInstance($path));
			if($ret){
				$this->doneCallback();
			}	
		}else if($rc->isSubclassOf("csvRelUnitFormat")){
			//csvRelUnitFormat
			$this->view->showLoadDataPre($data["cnt"],"relun");
			$ret = $this->model->updateRelForUnit($rc->newInstance($path));
			if($ret){
				$this->doneCallback();
			}	
		}else{
			$this->response->showError("CLASS(".$cls.")不是继承于csvFormat");
			return ;
		}
	}
	public function loadDataProcessingCallback($pos,$app,$upd){
		$this->view->showLoadDataProcessing($pos,$app,$upd);
	}
	public function doneCallback(){
		$this->view->doneCallback();
	}
	private function showFormUI(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showFormUI($msg->getPmcaiUrl()->getUrl());
	}
}