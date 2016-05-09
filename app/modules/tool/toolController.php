<?php
/**
 * Date: 2015年12月29日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/tool/toolModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/tool/toolView.php';
class toolController implements IController{
	/**
	 * 
	 * @var toolView
	 */
	private $view;
	/**
	 *
	 * @var toolModel
	 */
	private $model;
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $it){
		return true;
	}
	public function __construct(){
		$this->model = new toolModel();
		$this->view = new toolView();
		
	}
	
	public function welcomeAction(pmcaiMsg $msg){
		$this->view->main();
	}
	public function privmvcAction(pmcaiMsg $msg){
		if ($msg->isPost()){
			$this->model->genPrivMvc($msg);
			$this->back2main();
		}else{
			$this->view->showPriv();
		}
	}
	public function mvcAction(pmcaiMsg $msg){
		if ($msg->isPost()){
			$this->model->genMvc($msg);
			$this->back2main();
		}else{
			$this->view->show();
		}
	}
	public function sqlAction(pmcaiMsg $msg){
		if ($msg->isPost()){
			$sql = $this->model->genSql($msg);
			$this->view->setPmcaiMsg($msg);
// 			var_dump($sql);exit;
			$this->view->sql($this->model->getTabNames(),$sql["sql"],$sql["var"],$sql["arg"]);
		}else{
			$this->view->setPmcaiMsg($msg);
			$this->view->sql($this->model->getTabNames());
		}
	}
	private function back2main(){
		exit('ok,<a href="/tool">BACK TO MAIN CONSOLE</a>');
	}
}