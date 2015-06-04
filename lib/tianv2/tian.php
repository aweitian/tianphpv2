<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
define("DEBUG_FLAG", TRUE);
if(DEBUG_FLAG){
	error_reporting(E_ALL);
	ini_set("display_errors","On");
}else{
	error_reporting(0);
	ini_set("display_errors","Off");
}

define("ENTRY_PATH",dirname(dirname(dirname(__FILE__))));
define("ENTRY_HOME","/tianphpv2");
set_include_path(ENTRY_PATH.PATH_SEPARATOR.get_include_path());

class tian{
	/**
	 * @var runEnvir
	 */
	public static $runEnvir;
	/**
	 * @var httpRequest
	 */
	public static $requiest;
	/**
	 * @var httpResponse
	 */
	public static $response;
	/**
	 * @var urlManager
	 */
	public static $urlManager;
	/**
	 * @var message
	 */
	public static $message;
	private function __construct(){}
	
	public static function throwException($err_no){
		static $e;
		if(!is_array($e)){
			$dir = ENTRY_PATH.'/lib/tianv2/exceptions';
			$list = self::getFileList($dir,"php");
			$e = array();
			foreach ($list as $item){
				$e = $e + require_once $item;
			}
		}
		print "<pre>";
		throw new Exception($e[$err_no],$err_no);
	}
	public static function initRunEnvir(){
		self::$runEnvir = runEnvirFactory::getInstance()->runEnvir;
	}
	public static function initHttpRequest(){
		self::$requiest = new httpRequest();
	}
	public static function initHttpResponse(){
		self::$response = new httpResponse();
	}
	public static function initUrlManager(){
		if(is_null(self::$requiest)){
			self::throwException("7392");
			return;
		}
		if(is_null(self::$response)){
			self::throwException("7393");
			return;
		}
		self::$urlManager = new urlManager();
	}
	public static function initMsg(){
		
		//self::$message = new message(self::$requiest, $urlManager)
	}
	public static function getDirList($dir){
		$ret=array();
		if(!$handle = @opendir($dir)){
			return false;
		}
		while (false !== ($file = @readdir($handle))) {
			if($file==".")continue;
			if($file=="..")continue;
			$p = $dir.DIRECTORY_SEPARATOR.$file;
			if (is_dir($p)){
				$ret[]=$file;
			}
		}
		return $ret;
	}
	/**
	 *
	 * 获取目录下所有孩子文件全路径,后台的参数大小写不区分
	 * @param $dir
	 * @param $ext_filter 排除前面用!txt,ini.
	 */
	public static function getFileList($dir,$ext_filter=""){
		$ret=array();
		if(!$handle = @opendir($dir)){
			return false;
		}
		$filter=array();
		$filter_mode="include";
		if(is_string($ext_filter) && $ext_filter!=""){
			if(substr($ext_filter, 0,1)=="!"){
				$filter_mode="exclude";
				$filter=substr($ext_filter, 1);
			}else{
				$filter=explode(",", $ext_filter);
			}
		}
		while (false !== ($file = @readdir($handle))) {
			if($file==".")continue;
			if($file=="..")continue;
			$p = $dir.DIRECTORY_SEPARATOR.$file;
			$path = $p;
			if (is_file($p)){
				if($filter!=""){
					$p=explode(".", $file);
					if(is_array($p)){
						if($filter_mode=="include"){
							foreach ($filter as $f){
								if(strtolower(end($p))==strtolower($f))$ret[] = $path;
							}
						}else{
							foreach ($filter as $f){
								if(strtolower(end($p))!=strtolower($f))$ret[] = $path;
							}
						}
					}
				}else{
					$ret[] = $path;
				}
	
			}
		}
		return $ret;
	}
}