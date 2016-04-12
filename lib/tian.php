<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
require_once FILE_SYSTEM_ENTRY.'/lib/init.php';
class tian{
	private static $e;
	
	private function __construct(){}
	
	
	public static function throwException($err_no,$placeHolder=array()){
		if(!is_array(tian::$e)){
			$dir = FILE_SYSTEM_ENTRY.'/lib/exceptions';
			$list = self::getFileList($dir,"php");
			tian::$e = array();
			foreach ($list as $item){
				tian::addException($item);
			}
		}
		self::newException(tian::$e[$err_no],$err_no,$placeHolder);
	}
	public static function newException($msg,$no,$placeHolder=array()) {
		print "<pre>";
		$replacement = array();
		foreach ($placeHolder as $key => $val) {
			$replacement[":".$key] = $val;
		}
		if (count($replacement)) {
			$msg = strtr($msg,$replacement);
		}
		throw new Exception($msg,$no);
	}
	/**
	 * 
	 * @param string $path
	 * @return bool
	 */
	public static function addException($path){
		static $loaded_files = array();
		$p = realpath($path);
		if ($p) {
			$md5 = md5($p);
			if (!array_key_exists($md5,$loaded_files)) {
				$loaded_files[$md5] = $p;
				tian::$e = tian::$e + require_once $p;
				return true;
			}
		}
		return false;
	}
	/**
	 *
	 * @param string $path
	 * @return bool
	 */
	public static function addExceptionDir($dir){
		if(!is_array(tian::$e)){
			tian::$e = array();
		}
		$list = self::getFileList($dir,"php");
		foreach ($list as $item){
			tian::addException($item);
		}
	}
	private static function loadInterfaces() {
		return self::loadLibs("lib/interfaces");
	}
	public static function loadLibs($dir) {
		$ls = tian::getALLFileList($dir,"php");
		foreach($ls as $f) {
			require_once $f;
		}
		return ;
	}
	/**
	 * 获取目录下所有目录名，不递归
	 * @param string $dir
	 * @return array() 文件路径
	 */
	public static function getDirList($dir){
		$ret=array();
		if(!$handle = @opendir($dir)){
			return $ret;
		}
		while (false !== ($file = @readdir($handle))) {
			if($file==".")continue;
			if($file=="..")continue;
			$p = $dir.DIRECTORY_SEPARATOR.$file;
			if (is_dir($p)){
				$ret[]=$file;
			}
		}
		@closedir($handle);
		return $ret;
	}
	/**
	 *
	 * 获取目录下所有孩子文件全路径,后面的参数大小写不区分
	 * @param $dir
	 * @param $ext_filter 排除前面用!txt,ini.
	 */
	public static function getFileList($dir,$ext_filter=""){
		$ret=array();
		if(!$handle = @opendir($dir)){
			return $ret;
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
		@closedir($handle);
		return $ret;
	}
	/**
	 *
	 * 递归获取目录下所有文件全路径,后台的参数大小写不区分
	 * @param $dir
	 * @param $ext_filter 排除前面用!txt,ini.
	 */
	public static function getALLFileList($dir,$ext_filter="",&$ret=array()){
		$dirArr = self::getDirList($dir);
		
// 		var_dump($ret);
		foreach ($dirArr as $d) {
			self::getALLFileList($dir.DIRECTORY_SEPARATOR.$d,$ext_filter,$ret);
		}
		$ret = array_merge($ret , self::getFileList($dir,$ext_filter));
		return $ret;
	}
	public static function getClientIp() {
		$ip = $_SERVER["REMOTE_ADDR"];
		if(substr($ip,0,7) === "192.168" || substr($ip,0,3) === "127"){
			$fip = self::getForwardIp();
			if ($fip) {
				$ip = $fip;
			}
		}
		return($ip);
	}
	private static function getForwardIp(){
		$ip = getenv("HTTP_X_Forwarded_For");
		if(strpos($ip, ",") !== false){
			$ips = explode(",",$ip);
			$ip = $ips[sizeof($ips)-1];
		}
		return $ip;
	}
// 	public static function getDefPreMask(){
// 		if(HTTP_ENTRY == "" )return "";
// 		return str_repeat("p", count(explode("/", trim(HTTP_ENTRY,"/"))));
// 	}
}