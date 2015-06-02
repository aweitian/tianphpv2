<?php
/**
 * @author awei.tian
 * date: 2013-9-27
 * 说明:
 */
class httpResponse{
	const RESPONSE_TYPE_HTML=0;
	const RESPONSE_TYPE_JSON=1;


	public function __construct(){

	}
	/**
	 * 只设置HTTP STATUS
	 */
	public function _404(){
		@header('HTTP/1.x 404 Not Found');
		@header('Status: 404 Not Found');
		include_once dirname(__FILE__)."/404.tpl.php";
		exit();
	}

}