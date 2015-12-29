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
	
	/**
	 * 用于还原URL,区分URL中如果使用的是默认值,
	 * TRUE表示是空白,然后用默认值填充,FALSE表示传递过来用的是默认值
	 */
	private $ori_blank_m = false;
	private $ori_blank_c = false;
	private $ori_blank_a = false;
	public function __construct($url,$pmcaimask=""){
// 		var_dump($pmcaimask);exit;
		$this->url = new url($url);
		$this->initConf();
		$this->initMask($pmcaimask);
		$this->pmcaiArr = $this->getEmptyPmcai();
		$this->parse();
	}
	public function getPmcai(){
		return $this->pmcaiArr;
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
	public function setControl($control){
		$this->pmcaiArr["control"] = $control;
	}
	public function setAction($action){
		$this->pmcaiArr["action"] = $action;
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
	public function setQuery($k,$v){
		$this->url->setQuery($k, $v);
	}
	public function removeQuery($key){
		$this->url->removeQuery($key);
	}
	/**
	 * @return "" or a/b/c?d=e or ?a=b&c=d
	 */
	public function getUrl(){
		if($this->conf["mode"] == "get"){
			return $this->url_get();
		}else{
			return $this->url_pathinfo();
		}
	}
	public static function isValidMask($mask){
		return preg_match("/^p*m?c?a?$/", $mask);
	}
	public static function isValidConf($conf){
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
	public static function hasValidConf(){
		$path = FILESYSTEM_ENTRY_POINT."/app/conf/pmcaiUrl.php";
		if(file_exists($path)){
			$conf = require $path;
			if(!self::isValidConf($conf)){
				return false;
			}
		}
		return true;
	}
	
	
	
	/**
	 * for debug
	 * @param array $conf
	 */
	public function _setConfig($conf){
		$this->conf = $conf;
		$this->initConf();
		$this->pmcaiArr = $this->getEmptyPmcai();
		$this->parse();
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
// 		var_dump($data,$maskPmcai);exit;
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
		return self::isValidMask($mask);
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
	private function url_pathinfo(){
		$url = "";
		$p = join("/",$this->pmcaiArr["preurl"]);
		$url = $p;
		if(false !== strpos($this->mask, "m")){//GET参数中存在MODULE
			if(!$this->ori_blank_m || $this->pmcaiArr["module"] != $this->conf["moduleDefault"]){
				//原来URL中存在,或者现在不是默认值
				if($url == ""){
					$url = $this->pmcaiArr["module"];
				}else{
					$url = $url."/".$this->pmcaiArr["module"];
				}
			}
		}
		if(false !== strpos($this->mask, "c")){
			if(!$this->ori_blank_c || $this->pmcaiArr["control"] != $this->conf["controlDefault"]){
				//原来URL中存在,或者现在不是默认值
				if($url == ""){
					$url = $this->pmcaiArr["control"];
				}else{
					$url = $url."/".$this->pmcaiArr["control"];
				}
			}
		}
		if(false !== strpos($this->mask, "a")){
			if(!$this->ori_blank_a || $this->pmcaiArr["action"] != $this->conf["actionDefault"]){
				//原来URL中存在,或者现在不是默认值
				if($url == ""){
					$url = $this->pmcaiArr["action"];
				}else{
					$url = $url."/".$this->pmcaiArr["action"];
				}
			}
		}
		$i = $this->getInfo();
		if($url == ""){
			$url = $i;
		}else{
			$url = $url."/".$i;
		}
		$queryString = $this->url->query == "" ? "" : "?".$this->url->query;
		return $url.''.$queryString;
	}
	private function url_get(){
		$url = "";
		$p = join("/",$this->pmcaiArr["preurl"]);
		$url = $p;
		if(false !== strpos($this->mask, "m")){//GET参数中存在MODULE
			if(!$this->ori_blank_m || $this->pmcaiArr["module"] != $this->conf["moduleDefault"]){
				//原来URL中存在,或者现在不是默认值
				$this->url->setQuery($this->conf["module"], $this->pmcaiArr["module"]);
			}
		}
		if(false !== strpos($this->mask, "c")){
			if(!$this->ori_blank_c || $this->pmcaiArr["control"] != $this->conf["controlDefault"]){
				//原来URL中存在,或者现在不是默认值
				$this->url->setQuery($this->conf["control"], $this->pmcaiArr["control"]);
			}
		}
		if(false !== strpos($this->mask, "a")){
			if(!$this->ori_blank_a || $this->pmcaiArr["action"] != $this->conf["actionDefault"]){
				//原来URL中存在,或者现在不是默认值
				$this->url->setQuery($this->conf["action"], $this->pmcaiArr["action"]);
			}
		}
		$queryString = $this->url->query == "" ? "" : "?".$this->url->query;
		return $url.''.$queryString;
	}
	private function parse_get(){
		$this->pmcaiArr["preurl"] = explode("/", trim($this->url->path,"/"));
		if(false !== strpos($this->mask, "m")){
			$m = $this->url->getQuery($this->conf["module"]);
			if(!is_null($m)){
				$this->pmcaiArr["module"] = $m;
			} else {
				$this->ori_blank_m = true;
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
				$this->ori_blank_c = true;
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
				$this->ori_blank_a = true;
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
			$this->ori_blank_m = true;
			$this->pmcaiArr["module"] = $this->conf["moduleDefault"];
		}
		if($this->pmcaiArr["control"] == ""){
			$this->ori_blank_c = true;
			$this->pmcaiArr["control"] = $this->conf["controlDefault"];
		}
		if($this->pmcaiArr["action"] == ""){
			$this->ori_blank_a = true;
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
		return tian::getDefPreMask()."ca";
	}
	private function initConf(){
		if(is_array($this->conf)){
			return;
		}
		$path = "app/conf/pmcaiUrl.php";
		if(file_exists($path)){
			$conf = require $path;
			if(self::isValidConf($conf)){
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
}