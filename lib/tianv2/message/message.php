<?php
/**
 * @author awei.tian
 * date: 2013-8-28
 * 说明:它有一个HTTPREQUEST对象，可以通过getHttpRequest()来获取
 * 经过路由以后，把HTTPREQUEST变成MESSAGE对象，这个对象能设置URL，替换
 * 相同部位。有MODULE,CONTROLLER,ACTION属性
 * 通过[:NAME]来访问URL上的值，[NAME]来访问RAWBODY的值，不管是JSON类型，还是普通
 * 都把它解释成ARRAY
 * 把new这个对象的任务分配到context类中去
 * ? querystring
 * : pathinfo
 * * temp
 */
/**
 * 下面的文件包含了pmcai && httpdataconverter
 */
require_once '../route/routes/default/match/pmcaiUrl.php';
class message implements arrayaccess{
	private $request;
	private $urlManager;
	private $moduleLoc="";
	private $pmcai;
	private $_body_data_array=array();
	
	private $_query_access_char="?";
	private $_pathinfo_access_char=":";
	private $_pmcai_access_char="#";
	private $_pmcai_access_attr=array("Module","Control","Action");
	/**
	 * 临时变量,一般用于消息之间传递额外参数
	 * @var unknown
	 */
	private $_tempvar_access_char="*";
	private $_tempvar_data=array();
	/**
	 * 根据需要添加两个属性
	 */
	private $_dispatched_state;
	private $_dispatcher=null;
	private $_count_dispatch=0;
	private $_use_sys_control_not_found=false;
	/**
	 * @param httpRequest $request
	 * @param array $pmcai
	 * @param string $extra
	 * @param string $raw_query_string
	 * @param string $scheme
	 * @param string $host
	 * @param number $port
	 * @param string $fragment
	 */
	public function __construct(httpRequest $request,pmcaiUrl $urlManager,$extra="",$raw_query_string="",$scheme="http",$host="localhost",$port=80,$fragment=""){
		$this->request=$request;
		$this->urlManager=$urlManager;
		$this->pmcai=$urlManager->getPmcai();
		$this->_parse_raw_body_data();
		$this->_unsetUserData();
	}
	public function __set($k,$v){
		return false;	
	}
	public function getGetData(){
		return $this->urlManager->getQueryArray();
	}
	public function getPostData(){
		return $this->_body_data_array;
	}
	public function setDispatcher(dispatcher $dispatcher){
		$this->_dispatcher=$dispatcher;
	}
	public function setDispatchedState($s){
		$this->_dispatched_state=$s;
	}
	public function getDispatcher(){
		return $this->_dispatcher;
	}
	public function getDispatchState(){
		return $this->_dispatched_state;
	}
	public function getHttpRequest(){
		return $this->request;
	}
	public function getUrlManager(){
		return $this->urlManager;
	}
	public function getModule(){
		return $this->urlManager->getModule();
	}
	public function setModule($v){
		$this->urlManager->setModule($v);
		return $this;
	}
	public function getControl(){
		return $this->urlManager->getControl();
	}
	public function setControl($v){
		$this->urlManager->setControl($v);
		return $this;
	}
	public function getAction(){
		return $this->urlManager->getAction();
	}
	public function setAction($v){
		$this->urlManager->setAction($v);
		return $this;
	}
	public function getRawQueryString(){
		return $this->urlManager->getRawQuery();	
	}
	public function getRawHttpBodyData(){
		return $this->request->rawBody();	
	}
	public function getModuleLoc(){
		if($this->moduleLoc == ""){
			return $this->_getDefaultModuleLoc();
		}
		return $this->moduleLoc;
	}
	public function setModuleLoc($loc){
		$this->moduleLoc=$loc;
		return $this;
	}
	public function setPmcaiAccessChar($char){
		$this->_pmcai_access_char=$char;
		return $this;
	}
	public function setQueryAccessChar($char){
		$this->_query_access_char=$char;
		return $this;
	}
	public function setPathinfoAccessChar($char){
		$this->_pathinfo_access_char=$char;
		return $this;
	}
	public function setTempvarAccessChar($char){
		$this->_tempvar_access_char=$char;
		return $this;
	}
	public function getQueryAccessChar(){
		return $this->_query_access_char;
	}
	public function getPathinfoAccessChar(){
		return $this->_pathinfo_access_char;
	}
	public function getTempvarAccessChar(){
		return $this->_tempvar_access_char;
	}
	public function getPmcaiAccessChar(){
		return $this->_pmcai_access_char;
	}
	public function setDispatchCount($v){
		$this->_count_dispatch=$v;
		return $this;
	}
	public function getDispatchCount(){
		return $this->_count_dispatch;
	}
	public function getUseSysControlNotFound(){
		return $this->_use_sys_control_not_found;
	}
	public function setUseSysControlNotFound(){
		$this->_use_sys_control_not_found=true;
		return $this;
	}
	public function resetUseSysControlNotFound(){
		$this->_use_sys_control_not_found=false;
		return $this;
	}
	private function _getDefaultModuleLoc(){
		return ENTRY_PATH.C::get("defaultModuleLocation");
	}	
//---------------------------------------------------------------------
	private function _get_querystrig($_default){
		if($_default!=="")return $_default;
		return $this->request->getQueryString();
	}
	private function _get_scheme($_default){
		if($_default!=="")return $_default;
		return $this->request->getScheme();
	}
	private function _get_host($_default){
		if($_default!=="")return $_default;
		return $this->request->getHost();
	}
	private function _get_port($_default){
		if($_default!=="")return $_default;
		return $this->request->getPort();
	}
	private function _get_fragment($_default){
		if($_default!=="")return $_default;
		return "";
	}
	private function _unsetUserData(){
		unset($_POST);
		unset($_GET);
	}	
	private function _parse_raw_body_data(){
		if(empty($this->_body_data_array)){
			if(httpDataConverter::isJson($this->getRawHttpBodyData())){
				$this->_body_data_array=httpDataConverter::jsonToArray($this->getRawHttpBodyData());
			}else{
				$this->_body_data_array=httpDataConverter::formToArray($this->getRawHttpBodyData());
			}
		}
	}
	private function & _key($offset){
		$x = false;
		$_args = $this->_args($offset);
		$offset = $this->_offset($offset);
		if($_args===1)return $this->urlManager->getQueryArray();
		if($_args===2)return $this->urlManager->getPathinfoArray();
		if($_args===3)return $this->_tempvar_data;
		if($_args===4)return $x;
		return $this->_body_data_array;
	}
	private function _offset($offset){
		if($this->_args($offset)){
			$offset = substr($offset,1);
		}
		return $offset;
	}
	private function _args($offset){
		if(substr($offset,0,1) === $this->_query_access_char)return 1;
		if(substr($offset,0,1) === $this->_pathinfo_access_char)return 2;
		if(substr($offset,0,1) === $this->_tempvar_access_char)return 3;
		if(substr($offset,0,1) === $this->_pmcai_access_char)return 4;
		return 0;
	}
	public function offsetSet($offset, $value){
		$r = & $this->_key($offset);
		if($r === false){
			if($this->_args($offset)==4 && in_array($this->_offset($offset), $this->_pmcai_access_attr)){
				$this->{"set".$this->_offset($offset)}($value);
				return true;
			}
			return false;
		}
		$offset = $this->_offset($offset);
		$r[$offset] = $value;
		return true;
	}
	public function offsetExists($offset) {
		$r = $this->_key($offset);
		if($r === false){
			if($this->_args($offset)==4 && in_array($this->_offset($offset), $this->_pmcai_access_attr)){
				return true;
			}
			return false;
		}
		$offset = $this->_offset($offset);
		return isset($r[$offset]);
	}
	public function offsetUnset($offset) {
		$r = & $this->_key($offset);
		if($r === false){
			if($this->_args($offset)==4 && in_array($this->_offset($offset), $this->_pmcai_access_attr)){
				throw new Exception("permisstion denied @ unset message pmcai");
			}
			return false;
		}
		$offset = $this->_offset($offset);
		unset($r[$offset]);
	}
	public function offsetGet($offset) {
		$value = $this->_key($offset);
		if($value === false){
			if($this->_args($offset)==4 && in_array($this->_offset($offset), $this->_pmcai_access_attr)){
				return $this->{"get".$this->_offset($offset)}();
			}
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