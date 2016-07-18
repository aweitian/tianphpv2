<?php
/**
 * @author awei.tian
 * date: 2013-8-28
 * 说明:HTTP请求对象
 */
class httpRequest{
	/**
	 * @return $_FILES
	 */
	public function files(){
		return $_FILES;
	}
	/**
	 * 
	 * @param string $name
	 * @param string $default
	 * @return isset($_SERVER[$name]) ? $_SERVER[$name] : $default
	 */
	public function server($name,$default=null){
		return isset($_SERVER[$name]) ? $_SERVER[$name] : $default;
	}
	public function getQueryString(){
		return $_SERVER['QUERY_STRING'];
	}
	/**
	 * 小写
	 * @return string
	 */
	public function getMethod(){
		return strtolower($_SERVER['REQUEST_METHOD']);
	}
	public function getPort(){
		static $server_port = null;
		if ($server_port) return $server_port;
		if (isset($_SERVER['SERVER_PORT'])){
			$server_port = intval($_SERVER['SERVER_PORT']);
		}else{
			$server_port = 80;
		}
	
		if (isset($_SERVER['HTTP_HOST'])){
			$arr = explode(':', $_SERVER['HTTP_HOST']);
			$count = count($arr);
			if ($count > 1){
				$port = intval($arr[$count - 1]);
				if ($port != $server_port){
					$server_port = $port;
				}
			}
		}
		return $server_port;
	}
	public function getScheme(){
		$scheme=$_SERVER["SERVER_PROTOCOL"];
		$a=explode("/", $scheme);
		return strtolower($a[0]);
	}	
	public function getHost(){
		return $_SERVER["HTTP_HOST"];
	}	
	public function isPost(){
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
	
	public function frontUrl(){
		return isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '';
	}
	public function scenario(){
		return isset($_SERVER["HTTP_SCENARIO"]) ? $_SERVER["HTTP_SCENARIO"] : '';
	}
	public function currentUrl(){
		$url = 'http://';
		if (isset ( $_SERVER ['HTTPS'] ) && $_SERVER ['HTTPS'] == 'on') {
			$url = 'https://';
		}
		if ($_SERVER ['SERVER_PORT'] != '80') {
			$url .= $_SERVER ['SERVER_NAME'] . ':' . $_SERVER ['SERVER_PORT'] . $_SERVER ['REQUEST_URI'];
		} else {
			$url .= $_SERVER ['SERVER_NAME'] . $_SERVER ['REQUEST_URI'];
		}
		return $url;
	}
	/**
	 * http://localhost/we/werw?wer=fwer#sdfsd => /we/werw?wer=fwer
	 * @return string
	 */
	public function requestUri(){
		
		if (isset($_SERVER['HTTP_X_REWRITE_URL'])){
			$uri = $_SERVER['HTTP_X_REWRITE_URL'];
		}elseif (isset($_SERVER['REQUEST_URI'])){
			$uri = $_SERVER['REQUEST_URI'];
		}elseif (isset($_SERVER['ORIG_PATH_INFO'])){
			$uri = $_SERVER['ORIG_PATH_INFO'];
			if (! empty($_SERVER['QUERY_STRING'])){
				$uri .= '?' . $_SERVER['QUERY_STRING'];
			}
		}else{
			$uri = '';
		}
		return $uri;
	}

	public function isAjax(){
		return strtolower($this->header('X_REQUESTED_WITH')) == 'xmlhttprequest';
	}
	public function isFlash(){
		return strtolower($this->header('USER_AGENT')) == 'shockwave flash';
	}
	public function rawBody(){
		static $rawbody = null;
		if(is_null($rawbody))$rawbody = file_get_contents('php://input');
		return (strlen(trim($rawbody)) > 0) ? $rawbody : null;
	}
	public function header($header){
		$temp = 'HTTP_' . strtoupper(str_replace('-', '_', $header));
		if (!empty($_SERVER[$temp])) return $_SERVER[$temp];
		if (function_exists('apache_request_headers')){
			$headers = apache_request_headers();
			if (!empty($headers[$header])) return $headers[$header];
		}
		return false;
	}	
	public function getClientIp(){
		return util::getClientIp();
	}
	/**
	 * 此返回值为TRUE，表示客户端期望返回JSON数据类型
	 * @return boolean
	 */
	public static function isJsonAccept(){
		if(!isset($_SERVER["HTTP_ACCEPT"]))return false;
		return false !== strpos($_SERVER["HTTP_ACCEPT"], "application/json");
	}
}