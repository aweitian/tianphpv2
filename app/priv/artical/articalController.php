<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/artical/articalModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/artical/articalView.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/artical/artical_validator.php';


class articalController extends privController{
	/**
	 * 
	 * @var articalModel
	 */
	private $model;
	/**
	 * 
	 * @var articalView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new articalModel();
		$this->view = new articalView();
		$this->initHttpResponse();
	}
	public function welcomeAction(pmcaiMsg $msg){
		$length = 10;//每页显示多少行
		
		if (isset($msg["?page"])){
			$page = intval($msg["?page"]);
		}else{
			$page = 1;
		}
		if($page < 1){
			$page = 1;
		}
		
		$offset = ($page - 1) * $length;
		$data = $this->model->getList($offset,$length);
		
		if($data->isTrue()){
			
			$this->view->setPmcaiMsg($msg);
		
			$this->view->showList($this->priv->getUserInfo(),$data->return);
		}else{
			$this->response->showError($retR->info);;
		}
	}
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["title"],$msg["content"],$msg["date"])){
				$this->response->_404();
			}
			$retR = $this->model->add($msg["title"],$msg["content"],$msg["date"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showAddSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($retR->info);;
			}
			
			
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->showForm($this->priv->getUserInfo());			
		}

	}
}