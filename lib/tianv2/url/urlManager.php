<?php
/**
 * @author awei.tian
 * date: 2013-9-16
 * 说明:根据PMCAI数组设置一些相应的参数
 */
// scheme - 如 http 
// host 
// port 
// user 
// pass 
// path 
// query - 在问号 ? 之后 
// fragment - 在散列符号 # 之后 
//C::addAutoloadPath("urlManager", LIB_PATH."/url/urlManager.php");

require_once 'lib/tianv2/url/pmcai.php';
require_once "lib/tianv2/utils/httpDataConverter.php";
/**
 * 本类主要是拼凑URL
 * 
 * PATH来源（来源于PATH OR QS），RESPONSE CONTENT TYPE【放在ACTION.php   OR  QS】
 * 添加一个变量，位置可以选定在PATH OR QS
 */
class urlManager{
	const PATH_MODE_KVP=0;
	const PATH_MODE_NUM=1;
	const HTTP_HEAD_DATA_APPEND_POSITION_PATHINFO = 0;
	const HTTP_HEAD_DATA_APPEND_POSITION_QUERYSTRING = 1;
	
	
	const TOURL_ALL=0;//输出URL的全部
	const TOURL_PATH_QUERYSTRING=1;//输出URL的PATH & QS
	const TOURL_PATH=2;//输出URL的PATH
	const TOURL_QUERYSTRING=3;//输出URL的QS
	
	/**
	 * 新增加的HTTP HEAD 数据放在什么位置
	 * @var $_http_head_data_append_position
	 */
	private $_http_head_data_append_position = self::HTTP_HEAD_DATA_APPEND_POSITION_QUERYSTRING;
	
//################path from	
	const PATH_FROM_PATH=0;
	const PATH_FROM_QUERYSTRING=1;
	/**
	 * 此变量产生的原因是有的主机不支持URLREWRITE，用一个GET变量
	 * 作为PATH来路由
	 */
	public $pathFrom=self::PATH_FROM_PATH;
	/**
	 * 不设置默认为ROUTE_GET_NAME
	 * @var unknown
	 */
	public $pathInfoPlaceHolder="r";
//################end path from

	
	
	
//@@@@@@@@@@@@@@@@@@@Response	
	const RESPONSE_CONTENT_TYPE_FROM_ACTIONPOST=0;
	const RESPONSE_CONTENT_TYPE_FROM_QUERYSTRING=1;
	const RESPONSE_CONTENT_TYPE_FROM_OTHERS=2;
	public $responseContentTypeFrom=self::RESPONSE_CONTENT_TYPE_FROM_ACTIONPOST;
	/**
	 * 为FALSE认为URL上不包含此信息
	 * bool
	 */
	public $responseContentTypeFlag=true;
	public $responseContentTypePlaceHolder="ext";
	public $responseContentTypeValue="";
//@@@@@@@@@@@@@@@@@END REPONSE	

	
	
	private $_scheme="http";
	private $_host="localhost";
	private $_port=80;
	private $_fragment="";
	private $_extra="";//index.php之类的文件名
	/**
	 * string
	 * @var $_query
	 */
	private $_raw_query_string="";
	private $_query_array=array();
	
	/**
	 * pmcai array
	 * @var $_pmcai
	 */
	private $_pmcai;
	private $_raw_path="";
	private $_pathinfo_mode = self::PATH_MODE_KVP;
	/**
	 * $url array_pmcai or string_url
	 * @param array $options "mask"=>"ppmca" || "routename"=>"default" 两个都不存在就用默认 "routename"=>"default"
	 * 			
	 * @throws Exception
	 */
	public function __construct($pmcai=null,$extra="",$raw_query_string="",$scheme="http",$host="localhost",$port=80,$fragment=""){
		if(is_array($pmcai)){
			$this->_pmcai=pmcai::fixArrToPmcai($pmcai);
		}else{
			$this->_pmcai=pmcai::getEmptyPmcai();
		}
		if(is_string($raw_query_string)){
			$this->_raw_query_string=$raw_query_string;
			if(empty($this->_query_array)){
				$this->_raw_query_string=tian::$context->getRequest()->getQueryString();
				$this->_query_array=httpDataConverter::formToArray($this->_raw_query_string);
			}
		}
		if(is_string($scheme)){
			$this->_scheme=$scheme;
		}
		if(is_string($host)){
			$this->_host=$host;
		}
		if(is_string($port)||is_int($port)){
			$this->_port=$port;
		}
		if(is_string($fragment)){
			$this->_fragment=$fragment;
		}
		if(is_string($extra)){
			$this->_extra=$extra;
		}
		if(defined("ROUTE_GET_NAME")){
			$this->pathInfoPlaceHolder=ROUTE_GET_NAME;
		}
	}
	
	public static function fixUrlSlash($url){
		return str_replace("\\","/",$url);
	}
	const URL_COMPARE_ALL=0;
	const URL_COMPARE_PATHINFO=1;
	public static function compareUrl($a,$b,$compareMode=self::URL_COMPARE_ALL){
		$host=parse_url($a);
		if(isset($host["host"])){
			$host=$host["scheme"]."://".$host["host"];
		}else{
			$host=parse_url($b);
			if(isset($host["host"])){
				$host=$host["scheme"]."://".$host["host"];
			}else{
				$host="";
			}
		}
		$a=self::fixUrlSlash(str_replace($host,"",$a));
		$b=self::fixUrlSlash(str_replace($host,"",$b));
		if($compareMode==self::URL_COMPARE_ALL)return $a===$b;
		$t=explode("?",$a);
		if(count($t)<1)return false;
		$a=rtrim($t[0],"/");
		$t=explode("?",$b);
		if(count($t)<1)return false;
		$b=rtrim($t[0],"/");
		return $a===$b;
	}
	public function getPmcai(){
		return $this->_pmcai;
	}
	public function setPreurlWithEntry(){
		$p=ENTRY_HOME;
		$this->_pmcai["preurl"]=httpDataConverter::pathinfoToArr($p);
		return $this;
	}
	public function setModule($module){
		$this->_pmcai["module"]=(string)$module;
		return $this;
	}
	public function getModule(){
		return $this->_pmcai["module"];
	}
	public function setControl($control){
		$this->_pmcai["control"]=(string)$control;
		return $this;
	}
	public function getControl(){
		return $this->_pmcai["control"];
	}
	public function setAction($action){
		$this->_pmcai["action"]=(string)$action;
		return $this;
	}
	public function getAction(){
		return $this->_pmcai["action"];
	}
	/**
	 * @param string or array $arr
	 */
	public function setPmcaiPathinfoAll($arr){
		if(is_array($var)){
			$this->_pmcai["pathinfo"]=array_values($arr);
		}elseif (is_string($arr)){
			$this->_pmcai["pathinfo"]=httpDataConverter::pathinfoToArr($p);
		}
		return $this;
	}

	/**
	 * 对URL 中的query string array设置
	 * @param unknown $key
	 * @param unknown $val
	 * @return urlManager
	 */
	public function setQuery($key,$val){
		if(empty($this->_query_array)){
			$this->_query_array=httpDataConverter::formToArray($this->_raw_query_string);
		}
		$this->_query_array[$key]=$val;
		return $this;
	}
	
	/**
	 * 获取url querystring部分的值
	 * @param unknown $key
	 * @return multitype:|NULL
	 */
	public function getQuery($key){
		if(isset($this->_query_array[$key]))return $this->_query_array[$key];
		return null;
	}
	public function getRawQuery(){
		return $this->_raw_query_string;
	}
	public function getAllQueryArray(){
		return $this->_query_array;
	}
	public function setHttpHeadData($key,$val,$pos=null){
		if(!is_null($pos))$this->setHttpHeadDataAppendPos($pos);
		if($this->_http_head_data_append_position===self::HTTP_HEAD_DATA_APPEND_POSITION_PATHINFO){
			return $this->setPathInfoByKey($key, $val);
		}elseif ($this->_http_head_data_append_position===self::HTTP_HEAD_DATA_APPEND_POSITION_QUERYSTRING){
			return $this->setQuery($key, $val);
		}
	}
	public function setHttpHeadDataAppendPos($mode=self::HTTP_HEAD_DATA_APPEND_POSITION_QUERYSTRING){
		if($mode===self::HTTP_HEAD_DATA_APPEND_POSITION_PATHINFO){
			$this->_http_head_data_append_position=$mode;
		}elseif ($mode===self::HTTP_HEAD_DATA_APPEND_POSITION_QUERYSTRING){
			$this->_http_head_data_append_position=$mode;
		}
		return $this;
	}
	
	/**
	 * 先从PATHINFO中获取，没有从QUERYSTRING中获取
	 * @param unknown $key
	 * @return NULL|Ambigous <multitype:, NULL, multitype:>
	 */
	public function getHttpHeadData($key){
		$data=$this->getPmcaiPathinfoByKey($key);
		if(!is_null($data))return $data;
		$data=$this->getQuery($key);
		return $data;
	}
	
	/**
	 * 返回引用为message类提供方便
	 * @return multitype:
	 */
	public function &getPathinfoArray(){
		return $this->_pmcai["pathinfo"];
	}	
	/**
	 * 返回引用为message类提供方便
	 * @return multitype:
	 */
	public function &getQueryArray(){
		return $this->_query_array;
	}	
	public function setPmcaiPathinfoMode($m=self::PATH_MODE_KVP){
		$this->_pathinfo_mode=$m;
		return $this;
	}
	
	public function getScheme(){
		return $this->_scheme;
	}
	public function setScheme($v){
		if(is_string($v)){
			$this->_scheme=$v;
		}
		return $this;
	}

	public function getHost(){
		return $this->_host;
	}
	public function setHost($v){
		if(is_string($v)){
			$this->_host=$v;
		}
		return $this;
	}
	public function getPort(){
		return $this->_port;
	}
	public function setPort($v){
		if(is_string($v)||is_int($v)){
			$this->_port=$v;
		}
		return $this;
	}
	public function getFragment(){
		return $this->_fragment;
	}
	public function setFragment($v){
		if(is_string($v)){
			$this->_fragment=$v;
		}
		return $this;
	}
	public function getExtra(){
		return $this->_extra;
	}
	public function setExtra($v){
		if(is_string($v)){
			$this->_extra=$v;
		}
		return $this;
	}

	/**
	 * 按模式返回相应的值
	 * @param string|int $key
	 * @param PATHINFO_MODE $mode
	 */
	public function getPath($key,$mode=self::PATH_MODE_KVP){
		if($mode===self::PATH_MODE_KVP){
			$p=array_search($key, $this->_pmcai["pathinfo"]);
			if($p===false)return null;
			if(isset($this->_pmcai["pathinfo"][$p+1])){
				return $this->_pmcai["pathinfo"][$p+1];
			}
			return null;
		}else if($mode===self::PATH_MODE_NUM){
			$p=intval($key);
			if(isset($this->_pmcai["pathinfo"][$p])){
				return $this->_pmcai["pathinfo"][$p];
			}
			return null;
		}
	}

	/**
	 * 
	 * @param string|int $key
	 * @param string $val
	 * @param PATHINFO_MODE $mode
	 * @return urlBuilder
	 */
	public function setPath($key,$val,$mode=self::PATH_MODE_KVP){
		if($mode===self::PATH_MODE_KVP){
			$p=array_search($key, $this->_pmcai["pathinfo"]);
			if($p===false){
				$this->_pmcai["pathinfo"][]=$key;
				$this->_pmcai["pathinfo"][]=$val;
				return $this;
			}
			$this->_pmcai["pathinfo"][$p+1]=(string)$val;
			return $this;
		}else if($mode===self::PATH_MODE_NUM){
			$p=intval($key);
			$this->_pmcai["pathinfo"][$p]=(string)$val;
			return $this;
		}
	}
	public function setPathinfoByKey($key,$val){
		return $this->setPath($key, $val);
	}
	public function setPathinfoByNum($num,$val){
		return $this->setPath($num, $val,self::PATH_MODE_NUM);
	}
	/**
	 * getPath的别名
	 */
	public function getPathinfoByKey($key){
		return $this->getPath($key);

	}	
	public function getPathinfoByNum($num){
		return $this->getPath($num,self::PATH_MODE_NUM);

	}	
	/**
	 * TOURL_ALL;
	 * TOURL_PATH_QUERYSTRING;
	 * TOURL_PATH
	 * TOURL_QUERYSTRING
	 * @param unknown $mode
	 * @return string
	 */
	public function toUrl($mode=self::TOURL_PATH_QUERYSTRING){
		$url="";
		if($mode===self::TOURL_ALL){
			$url.=$this->_scheme;
			$url.="://";
			$url.=$this->_host;
			if(strval($this->_port)!=="80"){
				$url.=":";
				$url.=$this->_port;
			}
		}
		$url.="/";
		$url.=$this->_buildpath();
		if($mode===self::TOURL_PATH)return $url;
		if($this->_extra==="/"){$url.="/";}
		else if($this->_extra!==""){$url=trim($url,"/");$url.="/".$this->_extra;$url=trim($url,"/");}
		if($mode===self::TOURL_QUERYSTRING)$url="";
		$q=$this->_buildQueryString();
		if($q!==""){
			if(strpos($url, "?")===false){
				$url.="?".$q;
			}else{
				$url.="&".$q;
			}
		}
		if(trim($url,"/")==="")return "/";
		return "/".trim($url,"/");
	}
	private function _buildQueryString(){
		if($this->responseContentTypeFlag){
			if($this->responseContentTypeFrom==self::RESPONSE_CONTENT_TYPE_FROM_QUERYSTRING){
				$this->_query_array[$this->responseContentTypePlaceHolder]=$this->responseContentTypeValue;
			}
		}
		if($this->pathFrom==self::PATH_FROM_QUERYSTRING){
			$this->_query_array[$this->pathInfoPlaceHolder]=$this->_build_path_onqs();
		}
		return httpDataConverter::arrayToForm($this->_query_array);
	}
	private function _build_path_onqs(){
		$bk=$this->pathFrom;
		$this->pathFrom=self::PATH_FROM_PATH;
		$r=$this->_buildpath();
		$this->pathFrom!=$bk;
		return $r;
	}
	
	/**
	 * 组建 HTTP PATH部份
	 * 空
	 * aa/bb?a=b
	 * aa
	 * aa/bb
	 */
	private function _buildpath(){
		if($this->pathFrom!=self::PATH_FROM_PATH){
			return "";
		}
		$pmcai_p="";
		$preurl=implode("/", $this->_pmcai["preurl"]);
		if($preurl!==""){
			$pmcai_p=$preurl;
		}
		
		$pmcai_mca="";
		$module=$this->_pmcai["module"];
		if($module!==""){
			if($pmcai_mca!==""){
				$pmcai_mca=$pmcai_mca."/".$module;
			}else{
				$pmcai_mca=$module;
			}
		}
		$control=$this->_pmcai["control"];
		if($control!==""){
			if($pmcai_mca!==""){
				$pmcai_mca=$pmcai_mca."/".$control;
			}else{
				$pmcai_mca=$control;
			}
		}
		$action=$this->_pmcai["action"];
		if($action!==""){
			if($this->responseContentTypeFlag){
				if($this->responseContentTypeFrom==self::RESPONSE_CONTENT_TYPE_FROM_ACTIONPOST){
					if(!empty($this->responseContentTypeValue)){
						$action.=$this->responseContentTypeValue;
					}
				}
			}
			if($pmcai_mca!==""){
				$pmcai_mca=$pmcai_mca."/".$action;
			}else{
				$pmcai_mca=$action;
			}
		}
		if($this->_pathinfo_mode===self::PATH_MODE_NUM){
			$data=$this->_pmcai["pathinfo"];
			$pmcai_i="";
			if(count($data)%2!==0){
				array_push($data,null);
			}
			for($i=0;$i<count($data)/2;$i++){
				$pmcai_i.="&".$data[2*$i]."=".$data[2*$i+1];
			}
			if($pmcai_i!==""){
				$pmcai_i=trim($pmcai_i,"&");
			}
		}else if($this->_pathinfo_mode===self::PATH_MODE_KVP){
			$data=$this->_pmcai["pathinfo"];
			$pmcai_i=implode("/", $data);
		}
		$ret="";
		if($pmcai_p!="")$ret.=$pmcai_p."/";
		if($pmcai_mca!="")$ret.=$pmcai_mca."/";
		if($pmcai_i!="")$ret.=$pmcai_i;
		return $ret;
	}
}