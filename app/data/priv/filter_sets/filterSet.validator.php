<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
class filterSetValidator {
	public static function isValidName($name) {
		return is_string ( $name ) && $name !== "";
	}
	public static function isValidUrl($url) {
		return preg_match("/^[\w-]+$/",$url);
	}
	public static function isValidOrder($ord){
		return validator::isInt($ord);
	}
	public static function isValidMid($mid){
		return validator::isUint($mid);
	}
}