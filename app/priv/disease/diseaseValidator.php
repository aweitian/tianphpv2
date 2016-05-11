<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
class diseaseValidator{
	public static function isValidData($v){
		return is_string($v) && $v !== "";
	}
}