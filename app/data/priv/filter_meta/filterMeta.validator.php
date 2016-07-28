<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once FILE_SYSTEM_ENTRY . "/lib/db/mysql/mysqlColumnInfo.php";
class filterMetaValidator {
	public static function isValidType($type) {
		$colinfo = new mysqlColumnInfo ( "data_hosipital_filter_meta", "type" );
		$fields = explode ( ",", $colinfo->getLen () );
		return in_array ( $type, $fields );
	}
	public static function isValidData($data) {
		return is_string($data) && strlen($data) > 0;
// 		return ! is_null ( json_decode ( $data ) );
	}
	public static function isValidOrder($order) {
		return validator::isInt ( $order );
	}
}