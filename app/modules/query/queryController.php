<?php
/**
 * Date: 2016-04-26
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/query/queryModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/query/queryView.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/query/qArgs.php';

class queryController extends AppController{
	/**
	 * 
	 * @var queryModel
	 */
	private $model;
	/**
	 * 
	 * @var queryView
	 */
	private $view;
	public function __construct(){
		$this->model = new queryModel();
		$this->view = new queryView();
	}
	public function welcomeAction(pmcaiMsg $msg){
		if($msg->isPost()){
			
			//array(7) { 
			//["level"]=> string(4) "plan" 
			//["sel_chananel"]=> string(6) "百度" 
			//["sel_account"]=> string(11) "shb-九龙2" 
			//["sel_plan"]=> string(19) "不育-男性不育" 
			//["device"]=> string(1) "m" 
			//["groupidea"]=> string(2) "on" 
			
			$r = new View();
			echo $r->utf8Header(); 
			$cd = $this->chkPostData($msg);
			if($cd->isTrue()){
				echo $cd->info;
			}else{
				echo $cd->info;
			} 
			
			
		}else{
			$this->showFormUI($msg);
		}
	}
	public function jsAction(){
		Header('Content-Type: text/javascript');
		print file_get_contents(dirname(__FILE__)."/js/showTreeSelect.js");
		exit;
	}
	private function showFormUI(pmcaiMsg $msg){
		$this->view->setPmcaiMsg($msg);
		$this->view->showFormUI($msg->getPmcaiUrl()->getUrl());
	}
	
	/**
	 * 把表单格式转化为qArgs类
	 * 如果成功，RET为	qArgs
	 * @param pmcaiMsg $msg
	 * @return rirResult
	 */
	private function chkPostData(pmcaiMsg $msg){
		if(!isset($msg["span"],$msg["level"],$msg["device"],$msg["groupidea"])){
			return new rirResult(1,"POST 参数格式不对");
		}
		$ret = new qArgs();
		
		if(!$ret->setDatespan($msg["span"])){
			return new rirResult(5,"时间段检查没有通过");
		}
		
		switch($msg["level"]){
			case "all":
				break;
			case "channel":
				if(!isset($msg["sel_channel"]) || !$ret->setLevel(qArgs::LVL_CHANNEL,array($msg["sel_channel"]))){
					return new rirResult(2,"层级为渠道，但没有相应的渠道参数");
				}
				break;
			case "account":
				if(!isset($msg["sel_account"]) || !$ret->setLevel(qArgs::LVL_ACCOUNT,$msg["sel_account"])){
					return new rirResult(2,"层级为账户，但缺少参数：渠道或者账户");
				}
				break;
			case "plan":
				if(!isset($msg["sel_plan"]) || !$ret->setLevel(qArgs::LVL_PLAN,$msg["sel_plan"])){
					return new rirResult(2,"层级为计划，但缺少参数：渠道,账户或者计划");
				}
				break;
			case "unit":
				if(!isset($msg["sel_unit"]) || !$ret->setLevel(qArgs::LVL_UNIT,$msg["sel_unit"])){
					return new rirResult(2,"层级为单元，但缺少参数：渠道,账户,计划或者单元");
				}
				break;
			default:
				return new rirResult(2,"层级格式不能识别");
		}
		switch($msg["device"]){
			case "all":
				break;
			case "pc":
				$ret->setDev(qArgs::DEV_PC);
				break;
			case "m":
				$ret->setDev(qArgs::DEV_M);
				break;
			default:
				return new rirResult(3,"设备格式不能识别");
		}
		switch($msg["groupidea"]){
			case "on":
			case "off":
				$ret->setGrpIdea($msg["groupidea"] == "on");
				break;
			default:
				return new rirResult(4,"合并创意格式不能识别");
		}
		return new rirResult(0,"ok",$ret);
	}
	
}