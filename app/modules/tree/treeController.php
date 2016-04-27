<?php
/**
 * Date: 2016-04-27
 * Author: Awei.tian
 * Description: 
 * 		站在森林的角度去思考:
 * 	
 * 		array(
 * 			key1 => array(
 * 				data => array(
 * 					id => 11
 * 				),
 * 				children => array(
 * 					*recursive*
 * 				)
 * 			),
 * 			key2 => array(
 * 				data => array(
 * 					id => 12
 * 				),
 * 				children => array(
 * 					*recursive*
 * 				)
 * 			)
 * 
 * 		)
 * 
 * 
 * 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/tree/treeModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/tree/treeView.php';
class treeController extends AppController{
	/**
	 * 
	 * @var treeModel
	 */
	private $model;
	/**
	 * 
	 * @var treeView
	 */
	private $view;
	public function __construct(){
		$this->model = new treeModel();
		$this->view = new treeView();
	}
	public function welcomeAction(pmcaiMsg $msg){
		
	}
	public function channelAction(pmcaiMsg $msg){
		$this->view->jsonOutput($this->model->channel(),$msg);
	}
	public function accountAction(pmcaiMsg $msg){
		$this->view->jsonOutput($this->model->account(),$msg);
	}
	public function planAction(pmcaiMsg $msg){
		$this->view->jsonOutput($this->model->plan(),$msg);
	}
	public function unitAction(pmcaiMsg $msg){
		$this->view->jsonOutput($this->model->unit(),$msg);
	}
}