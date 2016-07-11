<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY."/modules/priv/priv.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/editor/editorView.php";
require_once FILE_SYSTEM_ENTRY."/app/modules/editor/editorModel.php";
class editorController extends appCtrl{
	/**
	 *
	 * @var editorModel
	 */
	private $model;
	/**
	 *
	 * @var editorView
	 */
	private $view;
	
	public function __construct(){
		$this->priv = new priv(App::getSession());
		if(!$this->priv->isLogined()){
			$request = new httpRequest();
			$url = $request->requestUri();
			$ret = "?redirect=".urlencode($url);
			$this->response = new httpResponse();
			$this->response->go("/priv/login".$ret);
		}
		$this->model = new editorModel();
		$this->view = new editorView();
	}
	public function welcomeAction(pmcaiMsg $msg){
		$this->view->editor($this->model);
	}
	public function uploadAction(pmcaiMsg $msg){
		uploadFactory::getInstance()->upload();
		
	}
}