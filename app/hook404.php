<?php
/**
 * Date: 2016年1月8日
 * Author: Awei.tian
 * Description: 
 */
class hook404 implements IControlNotFound{
	public function __construct(){

	}
	public function hook404(pmcaiMsg $msg){
		//$rep = new httpResponse();
		//$rep->_404();
		echo $msg->getControl(),"<br>";
		echo $msg->getAction();
	}
}