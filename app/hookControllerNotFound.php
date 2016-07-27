<?php
/**
 * Date: 2016年1月8日
 * Author: Awei.tian
 * Description: 
 */
class hookControllerNotFound implements IControlNotFound{
	public function _404(){
		$res = new httpResponse();
		$res->_404();
	}
	public function _control_not_found(pmcaiMsg $msg){
		$this->msg = $msg;
		$this->_404();
	}
}