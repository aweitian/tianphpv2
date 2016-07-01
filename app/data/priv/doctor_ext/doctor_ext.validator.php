<?php
class doctorExtValidator {
	public static function isValidDesc($v){
		return is_string($v) && $v != "";
	}
	public static function isValidSpec($v){
		return is_string($v) && $v != "";
	}
	public static function isValidDuty($v){
// 		var_dump($v);exit;
		return is_string($v) && preg_match("/^[0-3]{21}$/", $v);
	}
}