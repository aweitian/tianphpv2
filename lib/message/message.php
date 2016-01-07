<?php
/**
 * @author awei.tian
 * date: 2013-8-28
 * 说明:提供POST OR GET数据快速访问
 * ? querystring
 * POSTKEY
 */
/**
 * 下面的文件包含了pmcai && httpdataconverter
 */
require_once 'lib/request/url.php';
require_once "lib/utils/httpDataConverter.php";
require_once 'lib/request/httpRequest.php';
class message implements arrayaccess{
	private $request;
	private $_query_access_char = "?";
	private $_get_data;
	private $_post_data;
	
	/**
	 * @param httpRequest $request
	 * @param array $pmcai
	 */
	public function __construct(httpRequest $request){
		$this->request = $request;
		$this->_parse_raw_body_data();
		$this->_get_data = httpDataConverter::formToArray($this->request->getQueryString());
		//unset _GET _POST
		$this->_unsetUserData();
	}
	public function __set($k,$v){
		return false;	
	}
	public function getGetData(){
		return $this->_get_data;
	}
	public function getPostData(){
		return $this->_post_data;
	}
	public function getHttpRequest(){
		return $this->request;
	}
	public function getRawQueryString(){
		return $this->request->getQueryString();	
	}
	public function getRawHttpBodyData(){
		return $this->request->rawBody();	
	}
	public function isPost(){
		return $this->request->isPost();
	}
	
	
	
//---------------------------------------------------------------------
	private function _unsetUserData(){
		unset($_POST);
		unset($_GET);
	}	
	private function _parse_raw_body_data(){
		if(empty($this->_post_data)){
			if(httpDataConverter::isJson($this->getRawHttpBodyData())){
				$this->_post_data=httpDataConverter::jsonToArray($this->getRawHttpBodyData());
			}else{
				$this->_post_data=httpDataConverter::formToArray($this->getRawHttpBodyData());
			}
		}
	}
	private function & _key($offset){
		$_args = $this->_args($offset);
		if($_args === 1)return $this->_get_data;
		return $this->_post_data;
	}
	private function _offset($offset){
		if($this->_args($offset)){
			$offset = substr($offset,1);
		}
		return $offset;
	}
	private function _args($offset){
		if(substr($offset,0,1) === $this->_query_access_char)return 1;
		return 0;
	}
	public function offsetSet($offset, $value){
		$r = & $this->_key($offset);
		if($r === false){
			return false;
		}
		$offset = $this->_offset($offset);
		$r[$offset] = $value;
		return true;
	}
	public function offsetExists($offset) {
		$r = $this->_key($offset);
		if($r === false){
			return false;
		}
		$offset = $this->_offset($offset);
		return isset($r[$offset]);
	}
	public function offsetUnset($offset) {
		$r = & $this->_key($offset);
		if($r === false){
			return false;
		}
		$offset = $this->_offset($offset);
		unset($r[$offset]);
	}
	public function offsetGet($offset) {
		$value = $this->_key($offset);
		if($value === false){
			return false;
		}
		if(!is_array($value)){
			return false;
		}
		$offset = $this->_offset($offset);
		if(array_key_exists($offset,$value)){
			$value = $value[$offset];
		}else{
			$value = null;
		}
		return $value;
	}	
}