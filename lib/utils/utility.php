<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 */
class utility {
	public static function startsWith($haystack, $needle) {
		// search backwards starting from haystack length characters from the end
		return $needle === "" || strrpos ( $haystack, $needle, - strlen ( $haystack ) ) !== false;
	}
	public static function endsWith($haystack, $needle) {
		// search forward starting from end minus needle length characters
		return $needle === "" || (($temp = strlen ( $haystack ) - strlen ( $needle )) >= 0 && strpos ( $haystack, $needle, $temp ) !== false);
	}
	public static function utf8Substr($str, $from, $len) {
		return preg_replace ( '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' . '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s', '$1', $str );
	}
	public static function utf8Strlen($string) {
		$string = trim ( $string );
		if (empty ( $string ))
			return 0;
			// 将字符串分解为单元
		preg_match_all ( "/./us", $string, $match );
		// 返回单元个数
		return count ( $match [0] );
	}
	public static function isMobile() {
		$userAgent = strtolower ( $_SERVER ['HTTP_USER_AGENT'] );
		$keywords = array (
				"android",
				"iphone",
				"ipod",
				"ipad",
				"windows phone",
				"mqqbrowser",
				"symbian",
				"blackberry",
				"ucweb",
				"linux; u;" 
		);
		foreach ( $keywords as $kw ) {
			if (strpos ( $userAgent, $kw ) !== false)
				return true;
		}
		
		return false;
	}
}