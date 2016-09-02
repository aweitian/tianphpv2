<?php
/**
 * Date: 2016年1月8日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY . "/app/doctors/doctorsController.php";
require_once FILE_SYSTEM_ENTRY . "/app/disease/diseaseController.php";
require_once FILE_SYSTEM_ENTRY . "/app/tree/treeController.php";
class hookControllerNotFound implements IControlNotFound {
	public function _404() {
		$res = new httpResponse ();
		$res->_404 ();
	}
	public function _control_not_found(pmcaiMsg $msg) {
		$this->msg = $msg;
		
		if (doctorUIApi::getInstance ()->exists ( $msg->getControl () )) {
			new doctorsControllerNotFound ( $msg );
		} else if (diseaseUIApi::getInstance ()->exists ( $msg->getControl () )) {
			new diseaseControllerNotFound ( $msg );
		} else {
			$url = $msg->getHttpRequest ()->requestUri ();
			$url = explode ( "?", $url );
			if (preg_match ( "/^([\w\/]+?)\/(\d+)\.html$/", $url [0], $matches )) {
				new treeControllerNotFound ( $msg, trim ( $matches [1], "/" ), $matches [2] );
			} else if (preg_match ( "/^[\w\/]+$/", $url [0] )) {
				new treeControllerNotFound ( $msg, trim ( $url [0], "/" ), 0 );
			} else {
				$this->_404 ();
			}
		}
	}
}