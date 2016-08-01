<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class hosipitalValidator{
 	public static function isValidName($name){
 		return is_string($name) && $name !== "";
 	}
 	

 	
 }