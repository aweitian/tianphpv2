<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/symptom/symptomModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/symptom/symptomView.php';

require_once FILE_SYSTEM_ENTRY.'/app/utility/tabDataToArray.php';
class symptomController extends privController{
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
		$this->checkPriv();
		$this->model = new symptomModel();
		$this->view = new symptomView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		//目前按META来限制DATA树的深度
		if(isset($msg["?pid"])){
			$pid = intval($msg["?pid"]);
		}else{
			$pid = 0;
		}
		$meta = $this->model->getMeta();
// 		var_dump($meta);exit;
		if($pid == 0){
			$path = array(array(0,"全部症状"));
			$mv = $meta[0]["val"];
		} else {
			$info = $this->model->row($pid);
			if(empty($info)){
				$this->response->showError("invalid pid:".$pid);
			}
			$path = array(array(0,"全部症状"),array($pid,$info["data"]));
			$mv = $meta[1]["val"];
		}
// 		var_dump($mv);
		$data = $this->model->getData($pid);
// 		var_dump($data);exit;
		$this->view->setPmcaiMsg($msg);
		$this->view->showList($this->priv->getUserInfo(),$pid,$path,$mv,$data,count($meta));
	}
	
	
	
	public function rmAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->rm(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	
	
	public function importAction(pmcaiMsg $msg){
		if($msg->isPost()){
// 			echo $this->response->utf8Header();
			$demo = new tabDataToArray($msg["data"]);
			$ret = $demo->parse();
			if($ret->isTrue()){
				$row = $this->model->import($ret->return);
				$this->view->priv_wrap($this->priv->getUserInfo(), $this->view->info(
					"批量导入", "成功导入(".$row.")条记录,<a href='".HTTP_ENTRY."/priv/symptom'>症状管理</a>"
				))->show();
				
			}else{
				$this->response->showError($ret->info);
			}
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->import($this->priv->getUserInfo());
		}
	}
	
	
	
	public function editAction(pmcaiMsg $msg){
		$meta = $this->model->getMeta();
		if($msg->isPost()){
			if(!isset($msg["pid"],$msg["data"])){
				$this->response->_404();
			}
			$sid = intval($msg["pid"]);
// 			if(!symptomValidator::isValidData($msg["data"])){
// 				$this->response->showError("invalid data");
// 			}
			$edit_rir = $this->model->edit($sid, $msg["data"]);
			
			if($edit_rir->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showEditSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($edit_rir->info);
			}
			
			
		}else{
			if(!isset($msg["?sid"])){
				$this->response->_404();
			}else{
				$sid = intval($msg["?sid"]);
				$info = $this->model->row($sid);
// 				var_dump($info);exit;
				if(empty($info)){
					$this->response->_404();
				}
// 				$lvRet = $this->model->getLvBySid($info["metaid"]);
				$lvRet = $this->model->getLvBySid($sid);
// 				var_dump($lvRet);exit;
				if(!$lvRet->isTrue()){
					$this->response->_404();
				}
			}
			$this->view->setPmcaiMsg($msg);
			$this->view->showFormUI($this->priv->getUserInfo(), $sid,$meta[$lvRet->return]["val"],$info,$msg["?sid"]);
		}
	}
	
	
	
	public function addAction(pmcaiMsg $msg){
		$meta = $this->model->getMeta();
		if($msg->isPost()){
			//检查PID的LV合法性
			if(!isset($msg["pid"])){
				$pid = 0;
				$lv = 0;
				$next_lv = 0;
				$metaid = 0;
				foreach ($meta as $mi){
					if($mi["grp"] == SYMPTOM_GRP_ID && $mi["level"] == $next_lv){
						$metaid = $mi["sid"];
					}
				}
			}else{
				
				$pid = intval($msg["pid"]);
				if($pid == 0){
					$lv = 0;
					$next_lv = 0;
					$metaid = 0;
					foreach ($meta as $mi){
						if($mi["grp"] == SYMPTOM_GRP_ID && $mi["level"] == $next_lv){
							$metaid = $mi["sid"];
						}
					}
				}else{
					$tmp = $this->model->getLvBySid($pid);
					if(!$tmp->isTrue()){
						$this->response->showError($tmp->info);
					}
					$lv = $tmp->return;
					if($lv >= count($meta)){
						$this->response->showError("invalid level of pid");
					}
					$pinfo = $this->model->row($pid);
					$next_lv = $this->model->getNextMetaIdByGrpLv($pinfo["grp"], $lv);
					if($next_lv->isTrue()){
						$metaid = $next_lv->return;
					}else{
						$this->response->showError($next_lv->info);
					}
				}
			
			}
			
				
			if($metaid == 0){
				$this->response->showError("invalid next level");
			}
				
			//insert
			$ret = $this->model->add($msg["data"], $pid, SYMPTOM_GRP_ID, $metaid);
			if($ret->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showAddSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($ret->info);
			}
		}else{
			if(!isset($msg["?pid"])){
				$pid = 0;
				$lv = 0;
			}else{
				$pid = intval($msg["?pid"]);
				if($pid == 0){
					$lv = 0;
				}else{
					$tmp = $this->model->getLvBySid($pid);
					if(!$tmp->isTrue()){
						$this->response->showError($tmp->info);
					}
					$lv = $tmp->return + 1;
				}
					
			}
			$this->view->setPmcaiMsg($msg);
			$this->view->showFormUI($this->priv->getUserInfo(), $pid,$meta[$lv]["val"]);
		}
	}
	
}