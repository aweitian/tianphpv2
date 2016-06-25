<?php
/**
 * Date: 2016-05-13
 * Auth: Awei.tian
 * Desc:
 * 		
 */

class doctorValidator {
	public static function isValidAvatar($v){
		return is_string($v) && (
			utility::endsWith(strtolower($v), "jpg")
			|| utility::endsWith(strtolower($v), "png")
			|| utility::endsWith(strtolower($v), "gif")
		);
	}
	public static function isValidId($v){
		return is_string($v) && preg_match("/^\w+$/", $v);
	}
	public static function isValidName($v){
		return is_string($v);
	}
	public static function isValidPwd($v){
		return is_string($v) && strlen($v) > 2;
	}
}