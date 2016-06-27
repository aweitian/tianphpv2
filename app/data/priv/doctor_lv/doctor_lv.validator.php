<?php
class doctorLvValidator {
	public static function isValidDoctorLv($v){
		return is_string($v) && $v !== "";
	}
}