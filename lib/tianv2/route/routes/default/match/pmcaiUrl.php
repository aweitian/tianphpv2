<?php
/**
 * @author awei.tian
 * date: 2013-9-16
 * 说明:
 * 	本类主要是按PMCAI规则解析 URL和还原URL
 *  MCA来源有两种,GET OR PATHINFO
 *  不管哪种,PREURL都从PATHINFO中获取
 *  如果从GET方式中获取MCA,I为空
 */

require_once 'lib/tianv2/request/url.php';

class pmcaiUrl{
	private $conf;
	private $mask;
	const HTTP_HEAD_DATA_APPEND_POSITION_PATHINFO = 0;
	const HTTP_HEAD_DATA_APPEND_POSITION_QUERYSTRING = 1;
	/**
	 * @var url
	 */
	private $url;
	private $pmcaiArr;
	public function __construct($url,$pmcaimask=""){
		$this->url = new url($url);
		$this->initConf();
		$this->initMask($pmcaimask);
		$this->pmcaiArr = $this->getEmptyPmcai();
		$this->parse();
	}
	/**
	 * @return string 前后不带/
	 */
	public function getPreurl(){
		return join("/",$this->pmcaiArr["preurl"]);
	}
	public function getModule(){
		return $this->pmcaiArr["module"];
	}
	public function getControl(){
		return $this->pmcaiArr["control"];
	}
	public function getAction(){
		return $this->pmcaiArr["action"];
	}
	public function getInfo(){
		return join("/",$this->pmcaiArr["pathinfo"]);
	}
	private function getEmptyPmcai(){
		return array(
			"preurl"   => array(),
			"module"   => "",
			"control"  => "",
			"action"   => "",
			"pathinfo" => array()
		);
	}
	/**
	 *
	 * @param array $data
	 * @param string $maskPmcai
	 * @return array of pmcai
	 */
	private function initPmcai($data,$maskPmcai){
		$x=0;$url_arr=$data;$pmcai_mask_arr=str_split($maskPmcai);$pmcai=self::getEmptyPmcai();
		while ($x<count($url_arr)){
			if($x>=count($pmcai_mask_arr))$z="i";
			else $z=$pmcai_mask_arr[$x];
			$v=$url_arr[$x];
			switch ($z){
				case "p":$pmcai["preurl"][]=$v;break;
				case "m":$pmcai["module"]=$v;break;
				case "c":$pmcai["control"]=$v;break;
				case "a":$pmcai["action"]=$v;break;
				case "i":$pmcai["pathinfo"][]=$v;break;
			}
			$x++;
		}
		$this->pmcaiArr = $pmcai;
	}
	private function isValidPmcaiMask($mask){
		return preg_match("/^p*m?c?a?$/", $mask);
	}
	public function fixArrToPmcai($arr){
		if(!is_array($arr))return $this->getEmptyPmcai();
		$arr=$arr+$this->getEmptyPmcai();
		foreach ($arr as $k=>$v){
			if(!array_key_exists($k, self::getEmptyPmcai())){
				unset($arr[$k]);
			}
		}
		return $arr;
	}
		
	private function parse(){
		if($this->conf["mode"] == "get"){
			return $this->parse_get();
		}else{
			return $this->parse_pathinfo();
		}
	}
	private function parse_get(){
		$this->pmcaiArr["preurl"] = explode("/", trim($this->url->path,"/"));
		if(false !== strpos($this->mask, "m")){
			$m = $this->url->getQuery($this->conf["module"]);
			if(!is_null($m)){
				$this->pmcaiArr["module"] = $m;
			} else {
				$this->pmcaiArr["module"] = $this->conf["moduleDefault"];
			}
		}else{
			$this->pmcaiArr["module"] = $this->conf["moduleDefault"];
		}
		if(false !== strpos($this->mask, "c")){
			$c = $this->url->getQuery($this->conf["control"]);
			if(!is_null($c)){
				$this->pmcaiArr["control"] = $c;
			} else {
				$this->pmcaiArr["control"] = $this->conf["controlDefault"];
			}
		}else{
			$this->pmcaiArr["control"] = $this->conf["controlDefault"];
		}
		if(false !== strpos($this->mask, "a")){
			$a = $this->url->getQuery($this->conf["action"]);
			if(!is_null($a)){
				$this->pmcaiArr["action"] = $a;
			} else {
				$this->pmcaiArr["action"] = $this->conf["actionDefault"];
			}
		}else{
			$this->pmcaiArr["action"] = $this->conf["actionDefault"];
		}
		return ;
	}
	private function parse_pathinfo(){
		$this->initPmcai(explode("/", trim($this->url->path,"/")), $this->mask);
		if($this->pmcaiArr["module"] == ""){
			$this->pmcaiArr["module"] = $this->conf["moduleDefault"];
		}
		if($this->pmcaiArr["control"] == ""){
			$this->pmcaiArr["control"] = $this->conf["controlDefault"];
		}
		if($this->pmcaiArr["action"] == ""){
			$this->pmcaiArr["action"] = $this->conf["actionDefault"];
		}
		return;
	}
	
	private function initMask($mask){
		if($mask == ""){
			$this->mask = $this->defaultMask();
			return ;
		}
		if($this->isValidPmcaiMask($mask)){
			$this->mask = $mask;
		}else{
			tian::throwException("7395");
			return ;
		}
	}
	private function defaultMask(){
		return str_repeat("p", count(explode("/", trim(ENTRY_HOME,"/"))))."ca";
	}
	private function initConf(){
		if(is_array($this->conf)){
			return;
		}
		$path = ENTRY_PATH."/app/conf/pmcaiUrl.php";
		if(file_exists($path)){
			$conf = require_once $path;
			if($this->isValidConf($conf)){
				$this->conf = $conf;
				return ;
			}else{
				tian::throwException("7394");
				return;
			}
		}
		$this->conf = $this->defaultConf();
	}
	private function defaultConf(){
		return array(
			"mode" => "pathinfo",
			"moduleDefault" => "default",
			"controlDefault" => "main",
			"actionDefault" => "welcome",
		);
	}
	private function isValidConf($conf){
		if(!is_array($conf))return false;
		if(!array_key_exists('mode', $conf))return false;
// 		if($conf['mode'] != 'get' &&  $conf['mode'] != 'pathinfo')return false;
		if($conf['mode'] == 'get'){
			if(!array_key_exists('module', $conf))return false;
			if(!is_string($conf['module']))return false;
			if(!array_key_exists('control', $conf))return false;
			if(!is_string($conf['control']))return false;
			if(!array_key_exists('action', $conf))return false;
			if(!is_string($conf['action']))return false;
			if(!array_key_exists('controlDefault', $conf))return false;
			if(!is_string($conf['controlDefault']))return false;
			if(!array_key_exists('actionDefault', $conf))return false;
			if(!is_string($conf['actionDefault']))return false;
			if(!array_key_exists('moduleDefault', $conf))return false;
			if(!is_string($conf['moduleDefault']))return false;
			return true;
		}
		if($conf['mode'] == 'pathinfo'){
			if(!array_key_exists('controlDefault', $conf))return false;
			if(!is_string($conf['controlDefault']))return false;
			if(!array_key_exists('actionDefault', $conf))return false;
			if(!is_string($conf['actionDefault']))return false;
			if(!array_key_exists('moduleDefault', $conf))return false;
			if(!is_string($conf['moduleDefault']))return false;
			return true;
		}
		return false;
	}
}