<?php
/**
 * 路由的作用就是怎么看侍URL
 * @author awei.tian
 * 路由使用PMCAI规则处理URL
 *
 */
require_once 'lib/tianv2/route/route.php';
require_once 'pmcaiUrl.php';
require_once 'lib/tianv2/route/routes/default/pmcaiMsg.php';
class defaultRoute extends route{
	public $errorNo;
	private $mask;
	private $matched = false;
	/**
	 * @var pmcaiUrl
	 */
	private $pmcaiUrl;
	/**
	 * @var pmcaiMsg
	 */
	public $msg;
	public function __construct($pmcaiMask){
		$this->mask = $pmcaiMask;
	}
	public function getModule(){
		if(!$this->matched)return null;
		return $this->pmcaiUrl->getModule();
	}
	public function getControl(){
		if(!$this->matched)return null;
		return $this->pmcaiUrl->getControl();
	}
	public function getAction(){
		if(!$this->matched)return null;
		return $this->pmcaiUrl->getAction();
	}
	public function setModule($m){
		if(!$this->matched)return false;
		$this->pmcaiUrl->setModule($m);
		return true;
	}
	public function setControl($c){
		if(!$this->matched)return false;
		$this->pmcaiUrl->setControl($c);
		return true;
	}
	public function setAction($a){
		if(!$this->matched)return false;
		$this->pmcaiUrl->setAction($a);
		return true;
	}
	/**
	 * @see Iroute::match()
	 */
	public function match($url_path){
		if(!pmcaiUrl::hasValidConf()){
			$this->errorNo = "7394";
			return false;
		}
		if(!pmcaiUrl::isValidMask($this->mask)){
			$this->errorNo = "7395";
			return false;
		}
		$this->pmcaiUrl = new pmcaiUrl($url_path);
		$req = tian::$requiest;
		if(is_null($req)){
			tian::throwException("7392");
			return false;
		}
		
		$this->msg = new pmcaiMsg($req, $this->pmcaiUrl->getModule(), $this->pmcaiUrl->getControl(), $this->pmcaiUrl->getAction());
		return true;
	}
}
