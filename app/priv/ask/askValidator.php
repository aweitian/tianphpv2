<?php
/**
 * Date: 2016年5月24日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class askValidator{
 	public static function isValidTitle($v){
 		return is_string($v) && $v != "";
 	}
 	
 	public static function isValidDesc($v){
 		return is_string($v) && $v != "";
 	}
 	
 	public static function isValidSvr($v){
 		return is_string($v) && $v != "";
 	}
 	public static function isValidFiles($v){
 		return is_array($v);
 	}
 	
 	
 	//append validator
 	
 	public static function isValidRole($v){
 		return $v === "doctor" || $v === "user";
 	}
 	public static function isValidConmeta($v){
 		return $v === "text" || $v === "present";
 	}
 	
 	
 }