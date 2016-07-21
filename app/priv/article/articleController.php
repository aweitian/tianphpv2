<?php
/**
 * Date: 2016-05-12
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/article/articleModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/article/articleView.php';

class articleController extends privController{
	/**
	 * 
	 * @var articleModel
	 */
	private $model;
	/**
	 * 
	 * @var articleView
	 */
	private $view;
	public function __construct(){
		$this->checkPriv();
		$this->model = new articleModel();
		$this->view = new articleView();
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
		
			$this->view->showList($msg->getPmcaiUrl(),$this->priv->getUserInfo(),$data->return,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($retR->info);;
		}
	}
	
	public function commentlistAction(pmcaiMsg $msg){
		if (!isset($msg["?sid"])){
			$this->response->_404();
		}
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
		$ret = $this->model->getCommentsByAid($msg["?sid"], $offset, $length);
		if($ret->isTrue()) {
			$this->view->setPmcaiMsg($msg);
			$this->view->showListForComments($msg->getPmcaiUrl(), $this->priv->getUserInfo(), $ret, $page, $length);
		}else{
			$this->response->showError($ret->info);
		}
// 		var_dump($this->model->getCommentsByAid($msg["?sid"], $offset, $length)->return);
	}
	
	public function addcommentAction(pmcaiMsg $msg){
		
		if ($msg->isPost()){

// 			var_dump($msg->getPostData());
			if (!isset($msg["aid"], $msg["uid"], $msg["comment"])){
				$this->response->showError("invalid post data");
			}
			$ret = $this->model->addComment($msg["aid"], $msg["uid"], $msg["comment"]);
			if($ret->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}	
				$this->view->setPmcaiMsg($msg);
				$this->view->showOpSucc($this->priv->getUserInfo(),"添加评论",$ret_url);
			}else{
				$this->response->showError($ret->info);;
			}
			
		} else {
			if (!isset($msg["?aid"])){
				$this->response->_404();
			}
			$user = $this->model->getWaterArm();
			//var_dump($user);
			$this->view->setPmcaiMsg($msg);
			$this->view->showCommentForm($this->priv->getUserInfo(), $user);			
		}
		

		
	}
	
	
	public function commentAction(pmcaiMsg $msg){
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
		$data = $this->model->getAllComments($msg["?q"],$offset,$length);
		
		if($data->isTrue()){
			
			$this->view->setPmcaiMsg($msg);
		
			$this->view->showComment($msg->getPmcaiUrl(),$this->priv->getUserInfo(),$data,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($data->info);;
		}
	}
// 	public function reldocAction(pmcaiMsg $msg){
// 		$length = 10;//每页显示多少行
		
// 		if (isset($msg["?page"])){
// 			$page = intval($msg["?page"]);
// 		}else{
// 			$page = 1;
// 		}
// 		if($page < 1){
// 			$page = 1;
// 		}
		
// 		$offset = ($page - 1) * $length;
// 		$data = $this->model->getList($offset,$length);
		
// 		if($data->isTrue()){
			
// 			$this->view->setPmcaiMsg($msg);
		
// 			$this->view->showListForReldoc($msg->getPmcaiUrl(),$this->priv->getUserInfo(),$data->return,$page,$length,$msg["?q"]);
// 		}else{
// 			$this->response->showError($retR->info);;
// 		}
// 	}
	public function reldocAction(pmcaiMsg $msg){
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
		$data = $this->model->q_reldoc($offset,$length);
		
		if($data->isTrue()){
			
// 			var_dump($data->return);exit;
			
			$this->view->setPmcaiMsg($msg);
			
			$this->view->showListForReldoc(
				$msg->getPmcaiUrl(),
				$this->priv->getUserInfo(),
				$data->return,
				$this->model->getCacheDoctor(),
				$page,
				$length
			);
		}else{
			echo $data->info;exit;
			$this->response->showError($retR->info);;
		}
	}
	
	public function _d_xx74Action(pmcaiMsg $msg){
// 		require FILE_SYSTEM_ENTRY."/app/data/priv/article_tags/article_tags.api.php";
// 		$api = new article_tagsApi();
// 		$api->update(2, array(10,2,9));
		echo "just abandoned.";

	}
	
	
	public function reldisAction(pmcaiMsg $msg){
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
		$data = $this->model->q_reldis($offset,$length);
		
		if($data->isTrue()){
			
// 			var_dump($data->return);exit;
			
			$this->view->setPmcaiMsg($msg);
			
			$this->view->showListForReldis(
				$msg->getPmcaiUrl(),
				$this->priv->getUserInfo(),
				$data->return,
				$this->model->getCacheDisease(),
				$page,
				$length,
				$msg["?dc"],
				$msg["?di"],
				$msg["?q"]
			);
		}else{
			echo $data->info;exit;
			$this->response->showError($retR->info);;
		}
	}
	
	public function con_reldisAction(pmcaiMsg $msg){
// 		var_dump($msg->getPostData());
		if($msg->isPost()){
			//di disease category
			//ds article id array
			if(!isset($msg["ds"],$msg["di"])){
				$this->response->_404();
			}
			if($msg["di"] == 0){
				//remove rel
				if(!isset($msg["dd"])){
					$this->response->_404();
				}
				$dda = explode(",", $msg["dd"]);
				$dds = explode(",", $msg["ds"]);
				if(count($dda) != count($dds)){
					$this->response->_404();
				}
				foreach ($dds as $ak => $aid){
					$this->model->disconRelDis($aid, $dda[$ak]);
				}
				$this->response->redirect($_SERVER["HTTP_REFERER"]);
				return ;
			}
			
			
			$this->model->con_reldis(explode(",", $msg["ds"]), $msg["di"]);
			$this->view->showOpSucc($this->priv->getUserInfo(),"更新", $_SERVER["HTTP_REFERER"]);
		}else{
			$this->response->_404();
		}
	}
	
	public function con_reldocAction(pmcaiMsg $msg){
// 		var_dump($msg->getPostData());
		if($msg->isPost()){
			//di doctor id
			//ds article id array
			if(!isset($msg["ds"],$msg["di"])){
				$this->response->_404();
			}
			if($msg["di"] == 0){
				//remove rel
				if(!isset($msg["dd"])){
					$this->response->_404();
				}
				$dda = explode(",", $msg["dd"]);
				$dds = explode(",", $msg["ds"]);
				if(count($dda) != count($dds)){
					$this->response->_404();
				}
// 				exit(var_dump($msg->getPostData()));
				foreach ($dds as $ak => $aid){
					$this->model->disconRelDoc($aid, $dda[$ak]);
				}
				$this->response->redirect($_SERVER["HTTP_REFERER"]);
				return ;
			}
			
			
			$this->model->con_reldoc(explode(",", $msg["ds"]), $msg["di"]);
			$this->view->showOpSucc($this->priv->getUserInfo(),"更新", $_SERVER["HTTP_REFERER"]);
		}else{
			$this->response->_404();
		}
	}
	
	// 修改已关联的病种
	public function revreldisAction(pmcaiMsg $msg){
		//GET:page dc di q
		
		
		$length = 10;//每页显示多少行
		
		if (isset($msg["?page"])){
			$page = intval($msg["?page"]);
		}else{
			$page = 1;
		}
		if($page < 1){
			$page = 1;
		}
		if(!isset($msg["?dc"]) || is_null($msg["?dc"])){
			$dc = 0;
		}else{
			$dc = intval($msg["?dc"]);
		}
		if(!isset($msg["?di"]) || is_null($msg["?di"])){
			$di = 0;
		}else{
			$di = intval($msg["?di"]);
		}
		if(!isset($msg["?q"]) || is_null($msg["?q"])){
			$q = "";
		}else{
			$q = $msg["?q"];
		}
		
		
		
		$offset = ($page - 1) * $length;
		$data = $this->model->q_revreldis($dc,$di,$q,$offset,$length);
		
		if($data->isTrue()){
				
			// 			var_dump($data->return);exit;
				
			$this->view->setPmcaiMsg($msg);
				
			$this->view->showListForRevReldis(
					$msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),
					$data->return,
					$this->model->getCacheDisease(),
					$page,
					$length,
					$msg["?dc"],
					$msg["?di"],
					$msg["?q"]
			);
		}else{
			echo $data->info;exit;
			$this->response->showError($retR->info);;
		}
	}
	// 修改已关联的医生
	public function revreldocAction(pmcaiMsg $msg){
		//GET:page dc di q
		
		
		$length = 10;//每页显示多少行
		
		if (isset($msg["?page"])){
			$page = intval($msg["?page"]);
		}else{
			$page = 1;
		}
		if($page < 1){
			$page = 1;
		}
		if(!isset($msg["?do"]) || is_null($msg["?do"])){
			$do = 0;
		}else{
			$do = intval($msg["?do"]);
		}
		if(!isset($msg["?q"]) || is_null($msg["?q"])){
			$q = "";
		}else{
			$q = $msg["?q"];
		}
		
		
		
		$offset = ($page - 1) * $length;
		$data = $this->model->q_revreldoc($do,$q,$offset,$length);
		
		if($data->isTrue()){
				
			// 			var_dump($data->return);exit;
				
			$this->view->setPmcaiMsg($msg);
				
			$this->view->showListForRevReldoc(
					$msg->getPmcaiUrl(),
					$this->priv->getUserInfo(),
					$data->return,
					$this->model->getCacheDoctor(),
					$page,
					$length,
					$msg["?do"],
					$msg["?q"]
			);
		}else{
			echo $data->info;exit;
			$this->response->showError($retR->info);;
		}
	}
	
	/**
	 * 接受GET：aid,dod
	 * @param pmcaiMsg $msg
	 */
	public function rmreldocAction(pmcaiMsg $msg){
		if(!isset($msg["?aid"],$msg["?dod"])){
			$this->response->_404();
		}
		$ret = $this->model->disconRelDoc($msg["?aid"],$msg["?dod"]);
		if($ret->isTrue()){
			$this->response->redirect($_SERVER["HTTP_REFERER"]);
		}else{
			$this->response->showError($ret->info);
		}
		
	}
	/**
	 * 接受GET：aid,did
	 * @param pmcaiMsg $msg
	 */
	public function rmreldisAction(pmcaiMsg $msg){
		if(!isset($msg["?aid"],$msg["?did"])){
			$this->response->_404();
		}
		$ret = $this->model->disconRelDis($msg["?aid"],$msg["?did"]);
		if($ret->isTrue()){
			$this->response->redirect($_SERVER["HTTP_REFERER"]);
		}else{
			$this->response->showError($ret->info);
		}
		
	}
	
	public function ajaxQAction(pmcaiMsg $msg){
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
		if(!isset($msg["?q"])){
			$data = $this->model->getList($offset,$length);
		}else if($msg["?q"] == ""){
			$data = $this->model->getList($offset,$length);
		}else{
			$data = $this->model->choose($msg["?q"],$offset,$length);
		}
		
		$this->response->ContentType(httpResponse::CONTENT_TYPE_JSON);
		
		print json_encode($data);
		exit;
		
	}
	
	
	public function qAction(pmcaiMsg $msg){
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
		if(!isset($msg["?q"])){
			return $this->welcomeAction($msg);
		}
		if($msg["?q"] == ""){
			return $this->welcomeAction($msg);
		}
		
		$data = $this->model->q($msg["?q"],$offset,$length);
		
		if($data->isTrue()){
			
			$this->view->setPmcaiMsg($msg);
		
			$this->view->showList($msg->getPmcaiUrl(),$this->priv->getUserInfo(),$data->return,$page,$length,$msg["?q"]);
		}else{
			$this->response->showError($data->info);;
		}
	}
	
	public function rmAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->remove(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	public function rmcommentAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->removeComment(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	
	public function vercommentAction(pmcaiMsg $msg){
		$ret_url = $_SERVER["HTTP_REFERER"];
		if(!isset($msg["?sid"])){
			$this->response->_404();
		}
		$this->model->verifyComment(intval($msg["?sid"]));
		$this->response->redirect($ret_url);
	}
	
	
	public function editAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["kw"],$msg["desc"],$msg["thumb"],$msg["sid"],$msg["title"],$msg["content"],$msg["date"])){
				$this->response->_404();
			}
			if(!isset($msg["diid"])){
				$msg["diid"] = array();
			}
			if(!isset($msg["syid"])){
				$msg["syid"] = array();
			}
			if(!isset($msg["doid"])){
				$msg["doid"] = array();
			}
			if(!isset($msg["tags"])){
				$msg["tags"] = array();
			}
// 			var_dump($msg["tags"]);exit;
			$this->model->updateTags($msg["sid"], $msg["tags"]);
			$this->model->con_reldis(array($msg["sid"]), $msg["diid"]);
			$this->model->con_relsym(array($msg["sid"]), $msg["syid"]);
			$this->model->con_reldoc(array($msg["sid"]), $msg["doid"]);
			$retR = $this->model->update($msg["sid"],$msg["kw"],$msg["desc"],$msg["thumb"],$msg["title"],$msg["content"],$msg["date"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showEditSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($retR->info);
			}
		}else{
			if(!isset($msg["?sid"])){
				$this->response->_404();
			}
			$this->view->setPmcaiMsg($msg);
			$rowR = $this->model->row(intval($msg["?sid"]));
			if(!$rowR->isTrue()){
				$this->response->_404();
			}
			
			$this->view->showForm($this->priv->getUserInfo(),$this->getArticleInfo($msg["?sid"]),$rowR->return);			
		}
	}
	
	public function editcommentAction(pmcaiMsg $msg){
		if($msg->isPost()){
			if(!isset($msg["sid"],$msg["uid"],$msg["comment"],$msg["datetime"])){
				$this->response->_404();
			}
			$retR = $this->model->updateComment($msg["sid"],$msg["uid"],$msg["comment"],$msg["datetime"]);
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$this->view->showEditSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($retR->info);
			}
		}else{
			if(!isset($msg["?sid"])){
				$this->response->_404();
			}
			$this->view->setPmcaiMsg($msg);
			$row = $this->model->row_comment(intval($msg["?sid"]));
			if(empty($row)){
				$this->response->_404();
			}
			$this->view->showCommentForm($this->priv->getUserInfo(),$this->model->getWaterArm(),$row);			
		}
	}
	private function getArticleInfo($aid = 0){
		if($aid) {
			$def = array(
				"dis" => $this->model->q_reldis_aid($aid),
				"doc" => $this->model->q_reldoc_aid($aid),
				"sym" => $this->model->q_relsym_aid($aid),
				"tag" => $this->model->q_tags_aid($aid)
			);
		}else{
			$def = array(
				"dis" => array(),
				"doc" => array(),
				"sym" => array(),
				"tag" => array()
			);
		}
		
		return array(
			"def"    => $def,
			"doctor" => $this->model->getInfo_doctor(),
			"tags" => $this->model->getInfo_tags(),
			"disease" => $this->model->getInfo_disease(),
			"symptom" => $this->model->getInfo_symptom()
		);
	}
	/**
	 * 
	 * @param pmcaiMsg $msg
	 */
	public function addAction(pmcaiMsg $msg){
		if($msg->isPost()){
// 			var_dump($_REQUEST);exit;
			
			
			if(isset($_FILES) && isset($_FILES["thumb"]) && $_FILES["thumb"]["error"] == 0) {
				$ur = uploadFactory::getInstance()->upload();
				if($ur->info == 1) {
					$thumb_url = $ur->return["succ"]["thumb"];
				}else{
					var_dump($ur->return);
					$this->response->showError($ur->return["fail"]["thumb"]);
				}
			}else{
				$thumb_url = "";
			}
// 			var_dump($_REQUEST);exit;
			//2016-5-31 修改，提交参数为title,content,date,diid,syid,doid,tags
			if(!isset($_REQUEST["kw"],$_REQUEST["desc"],$_REQUEST["title"],$_REQUEST["content"],$_REQUEST["date"])){
				$this->response->_404();
			}

			$retR = $this->model->add($_REQUEST["kw"],$_REQUEST["desc"],$thumb_url,$_REQUEST["title"],$_REQUEST["content"],$_REQUEST["date"]);
			
			if($retR->isTrue()){
				if(isset($msg["?returl"])){
					$ret_url = $msg["?returl"];
				}else{
					$ret_url = "";
				}
				$aid = $retR->return;
				if(isset($_REQUEST["tags"])) {
					$this->model->updateTags($aid, $_REQUEST["tags"]);
				}
				if(isset($_REQUEST["diid"])) {
					$this->model->con_reldis(array($aid), $_REQUEST["diid"]);
				}
				if(isset($_REQUEST["syid"])) {
					$this->model->con_relsym(array($aid), $_REQUEST["syid"]);
				}
				if(isset($_REQUEST["doid"])) {
					$this->model->con_reldoc(array($aid), $_REQUEST["doid"]);
				}
				$this->view->showAddSucc($this->priv->getUserInfo(),$ret_url);
			}else{
				$this->response->showError($retR->info);;
			}
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->showForm($this->priv->getUserInfo(),$this->getArticleInfo());			
		}
	}
}