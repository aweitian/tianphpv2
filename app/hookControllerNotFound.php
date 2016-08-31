<?php
/**
 * Date: 2016年1月8日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/doctors/doctorsController.php";
require_once FILE_SYSTEM_ENTRY."/app/disease/diseaseController.php";
class hookControllerNotFound implements IControlNotFound{
	public function _404(){
		$res = new httpResponse();
		$res->_404();
	}
	public function _control_not_found(pmcaiMsg $msg){
		$this->msg = $msg;
		if(doctorUIApi::getInstance()->exists($msg->getControl())){
			new doctorsControllerNotFound($msg);
		}else if(diseaseUIApi::getInstance()->exists($msg->getControl())){
			new diseaseControllerNotFound($msg);
		}else{
			$this->_404();
		}
	}
}