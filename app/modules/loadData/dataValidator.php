<?php
/**
 * Date: Apr 22, 2016
 * Author: Awei.tian
 * Description: 
 */
class dataValidator {
	public static function isValidDate($v) {
		return validator::isDate($v);
	}
	public static function isValidChannel($v){
		return $v != "";
	}
	public static function isValidAcc($v){
		return $v != "";
	}
	public static function isValidPlan($v){
		return $v != "";
	}
	public static function isValidUnit($v){
		return $v != "";
	}
	public static function isValidIdea($v){
		return $v != "";
	}
	public static function isValidChat($v){
		return validator::isUint($v);
	}
	public static function isValidSubscribue($v){
		return validator::isUint($v);
	}
	public static function isValidRcvpayment($v){
		return preg_match("/^(([0-9]+.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*.[0-9]+)|([0-9]*[1-9][0-9]*))$/", $v);
	}
	public static function isValidKw($v){
		return $v != "";
	}
	public static function isValidLink($v){
		return $v != "";
	}
	public static function isValidPaysum($v){
		return preg_match("/^(([0-9]+.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*.[0-9]+)|([0-9]*[1-9][0-9]*))$/", $v);
	}
	public static function isValidShows($v){
		return validator::isUint($v);
	}
	public static function isValidClks($v){
		return validator::isUint($v);
	}
	public static function isValidCode($v){
		//可见字符范围
		return preg_match("/^[\x21-\x7e]+$/", $v);
	}
}