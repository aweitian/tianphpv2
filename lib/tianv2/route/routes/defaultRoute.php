<?php
require_once LIB_PATH."/url/urlManager.php";
C::addAutoloadPath("defaultRouteException", LIB_PATH.'/route/routes/defaultRouteException.php');
C::addAutoloadPath("IMatch", LIB_PATH.'/interfaces/IMatch.php');
C::addAutoloadPath("IRoute", LIB_PATH.'/interfaces/IRoute.php');
C::addAutoloadPath("pmcai", LIB_PATH.'/url/pmcai.php');
C::addAutoloadPath("matchIndex", LIB_PATH.'/mvc/route/match/matchIndex.php');
C::addAutoloadPath("route", LIB_PATH.'/mvc/route/route.php');
C::load(LIB_PATH."/_setting/defaultRoute.php");
/**
 * 路由的作用就是怎么看侍URL
 * @author Administrator
 *
 */

class defaultRoute extends route implements IRoute{
	/**
	 * 默认[正则路由]
	 */
	private $_regex="";
	private $_request=null;
	private $_default=array();
	
	
	private $_urlManager;
	private $_extra="";
	
	public $actionWithExt=false;
	private $_response_content_type="";
	private $_path_from;
	/**
	 * @throws defaultRouteException
	 * @param string $route 匹配URL的正则表达式
	 * @param string|array p*m?c?a? or array 
	 */
	public function __construct($routeRegExp,$default=array(),$actionWithExt=null,$pathFrom=null){
		$this->_pmcai_empty=pmcai::getEmptyPmcai();
		if(is_string($routeRegExp)){
			$route=trim($routeRegExp,"/");
			$this->_regex="#^{$route}\$#";
		}else{
			throw new defaultRouteException(null,defaultRouteException::INVALID_ARGS1);
		}
		$this->_checkDefault($default);
		if(is_null($actionWithExt)){
			$this->actionWithExt=C::get("defaultRouteResponseContentTypeSpecedInurl");
		}else{
			$this->actionWithExt=$actionWithExt;
		}
		
		if(is_null($pathFrom)){
			$this->_path_from=C::get("defaultRoutePathFrom");
		}else{
			$this->_path_from=$pathFrom;
		}
	}
	public function getPathFromUrl($url){
		if($this->_path_from==urlManager::PATH_FROM_PATH){
			$url_arr=parse_url($url);
			if(array_key_exists("path", $url_arr)){
				return $url_arr["path"];
			}
			
		}elseif ($this->_path_from==urlManager::PATH_FROM_QUERYSTRING){
			$url_arr=parse_url($url);
			if(array_key_exists("query",$url_arr)){
				$qsa=httpDataConverter::formToArray($url_arr["query"]);
				if(isset($qsa[C::get("defaultRoutePathFromQueryStringPlaceHolder")]))
				return ENTRY_HOME."/".trim($qsa[C::get("defaultRoutePathFromQueryStringPlaceHolder")],"/");
			}
			
		}
		return "";
	}

	/**
	 * pmcai array format:
	 * array(
	 * 	preurl=>
	 * 	module=>
	 * 	control=>
	 * 	action=>
	 * 	pathinfo=>
	 * )
	 * @see Iroute::match()
	 */
	public function match($url_path,$matcher){
		$url=pathinfo($this->getPathFromUrl($url_path));
		//fix bug windows root directory \ to /
		if($url["dirname"]===DIRECTORY_SEPARATOR){
			$url["dirname"]="/";
		}
//		var_dump($this->getPathFromUrl($url_path));exit;
		if(array_key_exists("extension",$url)){
			if($this->actionWithExt){
				//tian::$context->getResponse()->setResponseContentType($url["extension"]);
				$this->_response_content_type=$url["extension"];
				unset($url["extension"]);
				$url=$url["dirname"]."/".$url["filename"];
			}else{
				$this->_extra=$url["basename"];
				$url=$url["dirname"];

			}
		}else{
			$extra=explode("?", $url_path);
			$extra=$extra[0];
			if(substr($extra,-1)==="/"){
				$this->_extra="/";
			}else{
				$this->_extra="";
			}
			if(isset($url["filename"]))unset($url["filename"]);
			$url=implode("/", $url);
		}
	
		$url=trim($url,"/");
		
		if(preg_match($this->_regex, $url, $arguments)){
			if(!is_null($matcher)&& $matcher instanceof IMatch){
				$pmcai=$matcher->getPmcai($arguments);
			}else{
				
				if(is_array($this->_default)){
					$pmcai=$this->_default;
				}else{
//					var_dump(explode("/", $url));
					$x=0;$url_arr=explode("/", $url);
					$pmcai=pmcai::getPmcai($url_arr, $this->_default);
				}
				
			}
			$this->_urlManager=new urlManager($pmcai);
			$this->_urlManager->responseContentTypeFlag=C::get("responseContentTypeFlag");
			$this->_urlManager->responseContentTypeValue=$this->_response_content_type;
			$this->_urlManager->pathFrom=$this->_path_from;
			return true;
		}
		$this->_urlManager=new urlManager($this->_pmcai_empty);
		$this->_urlManager->responseContentTypeFlag=C::get("responseContentTypeFlag");
		$this->_urlManager->responseContentTypeValue=$this->_response_content_type;
		$this->_urlManager->pathFrom=$this->_path_from;
		return false;
	}
	public function getResponseContentType(){
		return $this->_response_content_type;
	}
	public function getUrlManager(){
		return $this->_urlManager;
	}
	public function getExtra(){
		return $this->_extra;
	}
	public function getDefault(){
		return $this->_default;
	}
	public function setDefault(){
		
	}
	private function _checkDefault($default){
		if(is_array($default)){
			$this->_default=$default;
		}elseif (is_string($default)&&pmcai::isValidPmcaiMask($default)){
			$this->_default=$default;
		}else{
			throw new defaultRouteException(null,defaultRouteException::INVALID_ARGS2);
		}
	}
}
