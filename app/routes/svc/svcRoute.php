<?php
/**
 * 路由的作用就是怎么看侍URL
 * @author awei.tian
 * ENTRY_HOME/svc/a/b/c
 *
 */
require_once 'app/routes/svcMsg.php';
class svcRoute extends route{
	public $errorNo;

	private $matched = false;

	/**
	 * @var svcMsg
	 */
	public $msg;
	public function __construct(){

	}

	/**
	 * @see Iroute::match()
	 */
	public function match($url_path){
// 		var_dump($url_path);exit;
		$url_path = trim($url_path,"/");
		$regexp = trim(ENTRY_HOME."/svc(/[\d\D]+)?","/");
		$regexp = "#^{$regexp}\$#";
// 		preg_match($regexp, $url_path,$matches);var_dump($matches);exit;
		if(!preg_match($regexp, $url_path,$matches)){
			return false;
		}
		$this->msg = new svcMsg(tian::$requiest, $matches[1]);	
		return true;
	}
}
