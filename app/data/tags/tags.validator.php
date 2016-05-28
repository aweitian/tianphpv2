<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class labelValidator{
 	public static function isValidLabel($label){
 		return is_string($label) && $label !== "";
 	}
 }