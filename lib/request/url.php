<?php
/**
 * @author:awei.tian
 * @date:2013-12-17
 * @functions:这里没有URL规则
 */
// scheme - 如 http
// host
// port
// user
// pass
// path
// query - 在问号 ? 之后
// fragment - 在散列符号 # 之后
require_once FILE_SYSTEM_ENTRY."/lib/utils/httpDataConverter.php";
class url{
	public $scheme="";
	public $host="";
	public $path="";
	public $query="";
	public function __construct($url){
		$urlArr = parse_url($url);
		if(isset($urlArr["scheme"]))$this->scheme=$urlArr["scheme"];
		if(isset($urlArr["path"]))$this->path=$urlArr["path"];
		if(isset($urlArr["query"]))$this->query=$urlArr["query"];
		if(isset($urlArr["host"]))$this->host=$urlArr["host"];
	}
	public function setQuery($key,$val){
		$queryArr=httpDataConverter::formToArray($this->query);
		$queryArr[$key]=$val;
		$this->query=httpDataConverter::arrayToForm($queryArr);
		return $this;
	}
	public function getQuery($key){
		$queryArr=httpDataConverter::formToArray($this->query);
		if(isset($queryArr[$key]))return $queryArr[$key];
		return null;
	}
	public function removeQuery($key){
		$queryArr=httpDataConverter::formToArray($this->query);
		if(array_key_exists($key,$queryArr))unset($queryArr[$key]);
		$this->query=httpDataConverter::arrayToForm($queryArr);
		return $this;
	}
	public function __toString(){
		$url="";
		if(!empty($this->scheme) && !empty($this->host)){
			$url.=$this->scheme."://".$this->host;
		}
		$url.=$this->path."?".$this->query;
		return $url;
	}
	public function toString(){
		return $this."";
	}
}