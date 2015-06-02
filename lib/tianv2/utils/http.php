<?php
/**
 * Date: 2014-10-10
 * Author: Awei.tian
 * function: 
 */
class http{

	public $responseHeaders;
	public $responseBody;
	
	private $defaultFlen  = 8192;//fread默认读取最大长度
	private $block        = true;//读取网络流 是否阻塞，true|阻塞，false|不阻塞
	private $req_header;
	private $req_body;
	private $timeout      = 15;
	private $crlf         = "\r\n";
	private $headers_readed = false;
	private $content_length_readed = false;
	private $content_length = 0;
	private $raw_response_data;
	private $method = "GET";
	/**
	 * 通过http方式获取数据
	 * 返回：HTTP获取处理后的信息
	 * @param  string $url  链接地址
	 * @param  string $ip   ip地址
	 * @param  string $port 
	 * @param  array $header
	 * @param  array/string $body
	 * @return string responsebody
	 */
	public function request($url, $ip='',$port=80, $header=array(), $body="") {
		//处理参数
		$this->_init();
		if(!empty($body)){
			$this->method = "POST";
		}
		$this->header($url,$header);
		$this->body($body);
		$this->_start($ip, $port, $this->timeout);
		return $this->responseBody;
	}
	private function _init(){
		$this->headers_readed = false;
		$this->raw_response_data = "";
		$this->content_length_readed = 0;
		$this->content_length = 0;
		$this->method = "GET";
		$this->req_body = "";
	}
	private function _start($ip,$port,$timeout){
		if(function_exists("fsockopen")){
// 			echo "fsockopen";
			$this->_fsocketopen($ip, $port, $timeout);
		}else if(function_exists("socket_create")){
			//echo "socket_create";
			$this->_socket_create($ip,$port,$timeout);
		}else{
			throw new Exception("can not create socket...");
		}
	}
	private function _socket_create($ip,$port,$timeout){
		$socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		@socket_connect($socket,$ip,$port);
		if(!$socket){
			throw new Exception("socket failed.");
		}
		
		$request = $this->req_header.$this->crlf.$this->req_body;
// 		exit($request);
		@socket_write($socket, $request, strlen($request));
		$this->_readheader("socket_read",array($socket,$this->defaultFlen));
		$this->_readbody("socket_read",array($socket,$this->defaultFlen));
		socket_close($socket);
	}
	private function _fsocketopen($ip,$port,$timeout){
		$httpFp = @fsockopen($ip, $port, $errno, $errstr, $this->timeout);
		@stream_set_blocking($httpFp, $this->block);
		@stream_set_timeout($httpFp, $this->timeout);
		$request = $this->req_header.$this->crlf.$this->req_body;
		@fwrite($httpFp, $request);
		if ($httpFp == false ) {
			fclose($httpFp);
			throw new Exception("request failed.");
		}
		$this->_readheader("fread",array($httpFp,$this->defaultFlen));
		$this->_readbody("fread",array($httpFp,$this->defaultFlen));
		fclose($httpFp);
	}
	private function _readheader($readcallback,$readcallback_args){
		if($this->headers_readed)
		{
			if($this->content_length < 0)
			{
				$this->responseBody = "";
			}
			return true;
		}
		$line = "";
		$tmp = "";
		while(true)
		{
			$this->raw_response_data .= call_user_func_array($readcallback, $readcallback_args);
// 			exit($this->raw_response_data);
			if(stripos($this->raw_response_data, $this->crlf.$this->crlf) !== false){
				$this->headers_readed = true;
				break;
			}
		}
		$this->responseHeaders = explode($this->crlf.$this->crlf, $this->raw_response_data,2);
		$this->responseHeaders = explode($this->crlf,$this->responseHeaders[0]);
		$this->responseBody    = $this->responseHeaders[1];
		foreach ($this->responseHeaders as $item){
			$header = explode(":", $item);
			if(count($header) == 2){
				if(strtolower(trim($header[0])) == "content-length"){
					$this->content_length = (int)trim($header[1]);
					break;
				}
			}
		}
		return true;
	}
	private function _readbody($readcallback,$readcallback_args){
		
		if(!$this->headers_readed)return;
		if($this->content_length < 0){
			throw new Exception("invalid response");
		}
		$this->content_length_readed = strlen($this->responseBody);
		if($this->content_length_readed >= $this->content_length)return true;
		while(true)
		{
			$this->raw_response_data .= call_user_func_array($readcallback, $readcallback_args);
			$body = explode($this->crlf.$this->crlf, $this->raw_response_data,2);
			$this->responseBody    = $body[1];
			$this->content_length_readed = strlen($this->responseBody);
			if($this->content_length_readed >= $this->content_length)return true;
		}
	}

	private function header($url,$header) {
		if(stripos($url, "http") !== 0){
			$url = "http://".$url;
		}
		$url_parsed_array = parse_url($url);
		$defaultHeaders = array(
			"Host" => $url_parsed_array["host"],
			"Accept" => "*/*",
			"Accept-Language" => "zh-cn",
			"User-Agent" => "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36",
			"Cache-Control" => "no-cache",
			"Connection" => "Close",
		);
		if($this->method == "POST"){
			$defaultHeaders["Content-Type"] = "application/x-www-form-urlencoded";
		}
		$httpHeader = $this->method;
		
		if(array_key_exists("path", $url_parsed_array))$httpHeader .= " ".$url_parsed_array["path"];
		else $httpHeader .= " /";
		if(array_key_exists("query", $url_parsed_array))$httpHeader .= "?".$url_parsed_array["query"];
		$httpHeader .= " HTTP/1.1".$this->crlf;

		foreach ($header as $key => $val){
			$defaultHeaders[ucfirst($key)] = $val;
		}
		foreach ($defaultHeaders as $key => $val){
			$httpHeader .= $key.": ".$val.$this->crlf;
		}
		$this->req_header = $httpHeader;
	}
	private function body($body){
		if(is_string($body)){
			$this->req_body = $body;
		}else if(is_array($body)){
			$this->req_body = http_build_query($body);
		}else{
			throw new Exception("invalid body");
		}
		
	}
}