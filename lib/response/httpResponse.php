<?php
/**
 * @author awei.tian
 * date: 2013-9-27
 * 说明:
 */
class httpResponse{
	
	const CONTENT_TYPE_HTML = "text/html";
	const CONTENT_TYPE_JSON = "application/json";
	const CONTENT_TYPE_JS = "text/javascript";
	const CONTENT_TYPE_PDF = "application/x-pdf";
	const CONTENT_TYPE_JPG = "image/jpeg";
	const CONTENT_TYPE_GIF = "image/gif";
	const CONTENT_TYPE_PNG = "image/png";
	
	const CONTENT_TYPE_EXE = "application/x-msdownload";
	const CONTENT_TYPE_CSS = "text/css";
	const CONTENT_TYPE_TXT = "text/plain";
	const CONTENT_TYPE_XML = "text/xml";
	
	const CONTENT_TYPE_BIN = "application/octet-stream";
	
	
	public function __construct(){

	}
	public static function getInstance(){
		return new self();
	}
	/**
	 * CONTENT_TYPE_JS
	 * @param int $t
	 */
	public function ContentType($t){
		Header('Content-Type: '.$t);
	}
	/**
	 * @return string <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 */
	public function utf8Header(){
		return '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
	}
	
	public function startDownload($path,$name=""){
		if(file_exists($path)){
			self::ContentType(self::CONTENT_TYPE_BIN);
			if(empty($name)){
				$name = pathinfo($path,PATHINFO_FILENAME);
			}
			header('Content-Disposition: attachment; filename="'.$name.'"');
			header('Content-Transfer-Encoding: binary');
			echo file_get_contents($path);
		}else{
			$this->_404();
		}
	}
	/**
	 * 使用GZIP输出
	 * @param string $content
	 */
	public function gzip($content){
		if( !headers_sent() && // 如果页面头部信息还没有输出
				extension_loaded("zlib") && // 而且zlib扩展已经加载到PHP中
				strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")) //而且浏览器说它可以接受GZIP的页面
		{
			$content = gzencode($content,9);//此页已压缩”的注释标签，然后用zlib提供的gzencode()函数执行级别为9的压缩，这个参数值范围是0-9，0表示无压缩，9表示最大压缩，当然压缩程度越高越费CPU。
			//然后用header()函数给浏览器发送一些头部信息，告诉浏览器这个页面已经用GZIP压缩过了！
			header("Content-Encoding: gzip");
			header("Vary: Accept-Encoding");
			header("Content-Length: ".strlen($content));
		}
		print $content; //返回压缩的内容，或者说把压缩好的饼干送回工作台。
	}
	/**
	 * 只设置HTTP STATUS
	 */
	public function _404(){
		@header('HTTP/1.x 404 Not Found');
		@header('Status: 404 Not Found');
		include_once TPL_404_CNF_PATH;
// 		debug_print_backtrace();
		exit;
	}
	public function showError($msg){
		include TPL_MSG_CNF_PATH;
		exit;
	}
	/**
	 * 相对于HTTP_ENTRY的URL地址
	 * @param string $url
	 */
	public function go($url){
		$url = HTTP_ENTRY.$url;
		$this->redirect($url);
	}
	/**
	 * 绝对URL地址
	 * @param string $url
	 */
	public function redirect($url){
		header("location:".$url);
		exit;
	}
}