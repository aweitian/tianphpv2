<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
class artical_validator {
	public static function isValidTitle($v){
		return is_string($v) && $v !== "";
	}
	public static function isValidContent($v){
		return is_string($v) && $v !== "";
	}
	public static function isValidKw($v){
		return is_string($v) && $v !== "";
	}
	public static function isValidDesc($v){
		return is_string($v) && $v !== "";
	}
	public static function isValidThumb($v){
		return utility::endsWith($v, ".png")
		||
		utility::endsWith($v, ".gif")
		||
		utility::endsWith($v, ".jpg");
	}
}