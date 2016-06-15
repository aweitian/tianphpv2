<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class searchController implements IController{
	/**
	 * 
	 * @var searchModel
	 */
	private $model;
	/**
	 * 
	 * @var searchView
	 */
	private $view;
	
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $identityToken){
		return true;
	}
	
	public function __construct() {
		$this->model = new searchModel();
		$this->view = new searchView();
		
	}
	
	
	public function welcomeAction(){
		echo "welcome";
	}
	private function ui(){
	
	}
}