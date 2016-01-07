<?php
class PHPVarType2PDOBindType{
	public static function convert($var){
		if(is_null($var))return PDO::PARAM_NULL;
		if(is_numeric($var))return PDO::PARAM_INT;
		return PDO::PARAM_STR;
	}
}