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
	
	private $rt;
	private $loc;
	/**
	 * 路由表 格式参考 array( "equal" "regExp" "startWith" "default" )
	 * @param array $rt
	 */
	public function __construct($rt){
		$this->rt = $rt;
	}
	/**
	 * init mask,module location
	 * @param string $url_path
	 */
	private function initMask($url_path){
		//去掉HTTP_ENTRY
		$url = $this->strip($url_path);
		
		$preg_p = HTTP_ENTRY == "" ? ""
			: str_repeat("p", count(explode("/", trim(HTTP_ENTRY,"/"))));
		
		
		//equal
		$eq_rt = $this->rt["equal"];
		foreach ($eq_rt as $key => $item){
			if($key == $url){
				$this->mask = $preg_p . $item["mca"];
				$this->loc = $item["loc"];
				return ;
			}
		}
		
		//regExp
		$reg_rt = $this->rt["regExp"];
		foreach ($reg_rt as $key => $item){
			if(preg_match("#^{$key}\$#",$url)){
				$this->mask = $preg_p . $item["mca"];
				$this->loc = $item["loc"];
				return ;
			}
		}
		
		//startWith
		$sw_rt = $this->rt["startWith"];
		foreach ($sw_rt as $key => $item){
			if(utility::endsWith($key, "/")){
				if(strpos($url,$key) === 0){
					$this->mask = $preg_p . $item["mca"];
					$this->loc = $item["loc"];
					return ;
				}
			}else{
				if($key === $url || strpos($url,$key."/") === 0){
					$this->mask = $preg_p . $item["mca"];
					$this->loc = $item["loc"];
					return ;
				}
			}
			
		}
		
		//default
		$def_rt = $this->rt["default"];
		$this->mask = $preg_p . $def_rt["mca"];
		$this->loc = $def_rt["loc"];
		
		return ;
	}
	
	public function getModuleLoc(){
		return $this->loc;
	}
	
	/**
	 * @return pmcaiUrl
	 */
	public function getPmcaiUrl(){
		return $this->url;		
	}
	/**
	 * 它会匹配任何形式的URL
	 * 在MATCH的时候再初始化路由表，效率会更好
	 * @see Iroute::match()
	 */
	public function match($url_path){
		$this->initMask($url_path);
		$this->url = new pmcaiUrl("",$this->mask);
		if(!pmcaiUrl::isValidMask($this->mask)){
			$this->errorNo = "7395";
			return false;
		}
		return $this->url->checkUrl($url_path);
	}
}
