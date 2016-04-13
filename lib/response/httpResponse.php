<?php
/**
 * @author awei.tian
 * date: 2013-9-27
 * 说明:
 */
class httpResponse{
	public function __construct(){

	}
	/**
	 * 只设置HTTP STATUS
	 */
	public function _404(){
		@header('HTTP/1.x 404 Not Found');
		@header('Status: 404 Not Found');
		include_once TPL_404_CNF_PATH;
// 		debug_print_backtrace();
		exit;
	}
	public function showError($msg){
		include TPL_MSG_CNF_PATH;
		exit;
	}
	/**
	 * 相对于HTTP_ENTRY的URL地址
	 * @param string $url
	 */
	public function go($url){
		$url = HTTP_ENTRY.$url;
		$this->redirect($url);
	}
	/**
	 * 绝对URL地址
	 * @param string $url
	 */
	public function redirect($url){
		header("location:".$url);
		exit;
	}
}