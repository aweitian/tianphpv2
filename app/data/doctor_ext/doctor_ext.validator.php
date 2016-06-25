<?php
class doctorExtValidator {
	public static function isValidDesc($v){
		return is_string($v) && $v != "";
	}
	public static function isValidSpec($v){
		return is_string($v) && $v != "";
	}
}