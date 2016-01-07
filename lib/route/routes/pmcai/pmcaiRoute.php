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
require_once FILE_SYSTEM_ENTRY.'/lib/route/route.php';
require_once FILE_SYSTEM_ENTRY.'/lib/route/routes/pmcai/pmcaiUrl.php';
require_once FILE_SYSTEM_ENTRY.'/lib/route/routes/pmcai/pmcaiMsg.php';
class pmcaiRoute extends route{
	private $mask;
	/**
	 * 
	 * @var pmcaiUrl
	 */
	private $url;
	public function __construct($pmcaiMask){
		$this->mask = $pmcaiMask;
		$this->url = new pmcaiUrl("",$pmcaiMask);
	}
	/**
	 * @return pmcaiUrl
	 */
	public function getPmcaiUrl(){
		return $this->url;		
	}
	/**
	 * 它会匹配任何形式的URL
	 * @see Iroute::match()
	 */
	public function match($url_path){
		if(!pmcaiUrl::isValidMask($this->mask)){
			$this->errorNo = "7395";
			return false;
		}
		return $this->url->checkUrl($url_path);
	}
}
