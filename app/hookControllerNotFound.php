<?php
/**
 * Date: 2016年1月8日
 * Author: Awei.tian
 * Description: 
 */
class hookControllerNotFound implements IControlNotFound{
	public function __construct(){

	}
	public function _control_not_found(pmcaiMsg $msg){
		$rep = new httpResponse();
		$rep->_404();
	}
}