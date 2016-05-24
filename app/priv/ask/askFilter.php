<?php
/**
 * Date: 2016年5月24日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class askFilter{
 	public static function fileFilter($data){
 		return join(",",$data);
 	}
 }