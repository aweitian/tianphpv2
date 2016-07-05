<?php
/**
 * Date: 2016年1月8日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/default/doctor.uiapi.php";
class hookControllerNotFound implements IControlNotFound{
	private $m;
	private $doc;
	public function __construct(){

		$this->m = array(
			"article" => 1,
			"ask" => 1,
			"present" => 1,
			"appraise" => 1,
		);

	}
	
	public function _control_not_found(pmcaiMsg $msg){
		if(doctorUIApi::getInstance()->exists($msg->getControl())){
			if(array_key_exists($msg->getAction(), $this->m)){
				
				
				return ;
			}
		}
		$this->_404();
	}
	
	private function _404(){
		$res = new httpResponse();
		$res->_404();
	}
}