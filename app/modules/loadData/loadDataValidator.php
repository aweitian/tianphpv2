<?php
/**
 * Date: Apr 22, 2016
 * Author: Awei.tian
 * Description: 
 */
class loadDataValidator {
	public static $lastk = "";
	public static $lastv = "";
	private static function setInfo($k,$v){
		self::$lastk = $k;
		self::$lastv = $v;
	}
	public static function isValidDate($v) {
		self::setInfo("date",$v);
		return validator::isDate($v);
	}
	public static function isValidChannel($v){
		self::setInfo("Channel",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidAcc($v){
		self::setInfo("Acc",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidPlan($v){
		self::setInfo("Plan",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidUnit($v){
		self::setInfo("Unit",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidIdea($v){
		self::setInfo("Idea",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidChat($v){
		self::setInfo("Chat",$v);
		return $v === "" || validator::isUint($v);
	}
	public static function isValidSubscribue($v){
		self::setInfo("Subscribue",$v);
		return $v === "" || validator::isUint($v);
	}
	public static function isValidRcvpayment($v){
		self::setInfo("Rcvpayment",$v);
		return $v === "" || validator::isFloat($v);
	}
	public static function isValidKw($v){
		self::setInfo("Kw",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidLink($v){
		self::setInfo("Link",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidPaysum($v){
		self::setInfo("Paysum",$v);
		return validator::isFloat($v);
	}
	public static function isValidShows($v){
		self::setInfo("Shows",$v);
		return validator::isUint($v);
	}
	public static function isValidClks($v){
		self::setInfo("Clks",$v);
		return validator::isUint($v);
	}
	public static function isValidCode($v){
		self::setInfo("Code",$v);
		return validator::isVisableAscii($v);
	}
	public static function isValidTitle($v){
		self::setInfo("Title",$v);
		return is_string($v) && !validator::isEmpty($v);
	}
	public static function isValidDesc1($v){
		self::setInfo("Desc1",$v);
		return is_string($v);
	}
	public static function isValidDesc2($v){
		self::setInfo("Desc2",$v);
		return is_string($v);
	}
	public static function isValidMark($v){
		self::setInfo("Mark",$v);
		return is_string($v);
	}
	public static function isValidUrl($v){
		self::setInfo("Url",$v);
		return is_string($v) && !validator::isEmpty($v);;
	}
}