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
}