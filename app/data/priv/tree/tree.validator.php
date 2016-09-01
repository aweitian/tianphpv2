<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
class treeValidator {
	public static function isValidName($name) {
		return is_string ( $name ) && $name !== "";
	}
	public static function isValidUrl($url) {
		return preg_match("/^[\w-]+$/",$url);
	}
}