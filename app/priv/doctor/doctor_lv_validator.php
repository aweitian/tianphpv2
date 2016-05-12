<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
class doctor_lv_validator{
	public static function isValidDoctorLv($v){
		return is_string($v) && $v !== "";
	}
}