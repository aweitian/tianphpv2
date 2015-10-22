<?php
/**
 * @author:awei.tian
 * @date:2013-11-28
 * @functions:
 */
class validator{
	public static function isInt($v){
		return is_numeric($v) && preg_match("/^-?\d+$/",$v);
	}
	public static function isUint($v){
		return is_numeric($v) && preg_match("/^\d+$/",$v);
	}
	public static function isDate($v){
		return preg_match("/^(\d{4})[\/\-\.](0?[1-9]|1[012])[\/\-\.](0?[1-9]|[12][0-9]|3[01])$/",$v);
	}
	public static function isEmail($v){
		return preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",$v);
	}
	public static function isIp($ip){
		return preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $ip);
	}	
}