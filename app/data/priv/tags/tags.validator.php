<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class tagsValidator{
 	public static function isValidTags($label){
 		return is_string($label) && $label !== "";
 	}
 }