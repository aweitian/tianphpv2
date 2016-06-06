<?php
/**
 * Date: 2016年5月13日
 * Auth: Awei.tian
 * Desc:
 * 		
 */

require_once FILE_SYSTEM_ENTRY."/modules/algorithms/Security.php";
class userFilter {
	public static function filterPwd($ps){
		return Security::encrypt($ps);
	}
}