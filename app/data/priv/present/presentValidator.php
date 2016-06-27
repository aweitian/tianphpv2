<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
class presentValidator{
	public static function isValidAvatar($v){
		return is_string($v) && (
				utility::endsWith(strtolower($v), "jpg")
				|| utility::endsWith(strtolower($v), "png")
				|| utility::endsWith(strtolower($v), "gif")
		);
	}
	public static function isValidPresent($v){
		return is_string($v) && $v !== "";
	}
}