<?php
/**
 * Date: 2016-05-13
 * Auth: Awei.tian
 * Desc:
 * 		
 */

class userValidator {
	public static function isValidAvatar($v){
		return is_string($v) && (
			utility::endsWith(strtolower($v), "jpg")
			|| utility::endsWith(strtolower($v), "png")
			|| utility::endsWith(strtolower($v), "gif")
		);
	}
	public static function isValidPhone($v){
		return is_string($v) && preg_match("/^\d{3}-?\d{8}$/", $v);
	}
	public static function isValidName($v){
		return is_string($v);
	}
	public static function isValidPwd($v){
		return is_string($v) && strlen($v) > 2;
	}
	public static function isValidRpq($v){
		return is_string($v) && $v !== "";
	}
	public static function isValidRpa($v){
		return is_string($v) && $v !== "";
	}
}