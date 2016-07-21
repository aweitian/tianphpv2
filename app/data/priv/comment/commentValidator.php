<?php
/**
 * Date: 2016年5月24日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class commentValidator{
 	public static function isValidComment($v){
 		return is_string($v) && $v != "";
 	}
 	public static function isValidVerify($v){
 		return is_bool($v);
 	}
 }