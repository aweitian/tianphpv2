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
	public static function isFloat($v){
		return preg_match("/^(([0-9]+.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*.[0-9]+)|([0-9]*[1-9][0-9]*))$/", $v);
	}
	public static function isEmpty($v){
		return is_string($v) && $v == "";
	}
	public static function isVisableAscii($v){
		return preg_match("/^[\x21-\x7e]+$/", $v);
	}
	
	/**
	 * 描述：只允许用户输入中文，英文，数字，下划线，空格。但是必须是以中文或者英文开头的正则表达式。
	 */
	public static function isCn_UTF8($v){
		return preg_match('/^(?!_|\s\')[A-Za-z0-9_\x80-\xff\s\']+$/',$v);
	}
	/**
	 * 描述：只允许用户输入中文，英文，数字，下划线，空格。但是必须是以中文或者英文开头的正则表达式。
	 */
	public static function isCn_GBK($v){
		return preg_match('/^(?!_|\s\')[A-Za-z0-9_'.chr(0xa1).'-'.chr(0xff).'\s\']+$/',$v);
	}
}