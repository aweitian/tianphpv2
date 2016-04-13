<?php
/**
 * Date: 2015-1-6
 * Author: Awei.tian
 * function: 
 */
require_once FILE_SYSTEM_ENTRY."/lib/validate/validator.php";
class opValidator{
	public static function isValidOptype($v){
		return preg_match("/^\w{1,16}$/", $v);
	}
	public static function isValidIp($ip){
		return validator::isIp($ip);
	}

}