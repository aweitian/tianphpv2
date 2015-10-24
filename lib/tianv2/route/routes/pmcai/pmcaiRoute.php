<?php
/**
 * 路由的作用就是怎么看侍URL
 * @author awei.tian
 * 路由使用PMCAI规则处理URL
 * P可以理解为URL中的目录路径，可以多个，如：PPP
 * M最多只能一个，模块
 * C最多只能一个,CONTROLLER
 * A最多只能一个,ACTION
 * I可以多个，PATH INFO。
 * 下面的正则表示PMCAI MASK的合法规则 (PMCAI MASK类似如：PPM,MCI,PPMCAI，。。。)
 * /^p*m?c?a?$/
 * 正则中没有出现I，表示前面如果匹配成功，后面全是PATH INFO部分
 */
require_once 'lib/tianv2/route/route.php';
require_once 'pmcaiUrl.php';
require_once 'lib/tianv2/route/routes/pmcai/pmcaiMsg.php';
class pmcaiRoute extends route{
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
// 		var_dump($pmcaiMask);exit;
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
// 		var_dump($url_path);exit;
		$this->pmcaiUrl = new pmcaiUrl($url_path,$this->mask);
		$req = tian::$requiest;
		if(is_null($req)){
			tian::throwException("7392");
			return false;
		}
		
		$this->msg = new pmcaiMsg($req, $this->pmcaiUrl->getModule(), $this->pmcaiUrl->getControl(), $this->pmcaiUrl->getAction());
// 		var_dump($this->msg);exit;
		return true;
	}
}
