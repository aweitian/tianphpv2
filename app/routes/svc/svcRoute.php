<?php
/**
 * 路由的作用就是怎么看侍URL
 * @author awei.tian
 * HTTP_ENTRY/svc/a/b/c
 *
 */
require_once FILE_SYSTEM_ENTRY.'/app/routes/svcMsg.php';
class svcRoute extends route{
	public $errorNo;
	private $svcPath;
	private $matched = false;

	/**
	 * @var svcMsg
	 */
	public $msg;
	public function __construct(){

	}
	public function getSvcPath(){
		return $this->svcPath;
	}
	/**
	 * @see Iroute::match()
	 */
	public function match($url_path){
// 		var_dump($url_path);exit;
		$url_path = trim($url_path,"/");
		$regexp = trim(HTTP_ENTRY."/svc(/[\d\D]+)?","/");
		$regexp = "#^{$regexp}\$#";
// 		preg_match($regexp, $url_path,$matches);var_dump($matches);exit;
		if(!preg_match($regexp, $url_path,$matches)){
			return false;
		}
		$this->svcPath = $matches[1];	
		return true;
	}
}
