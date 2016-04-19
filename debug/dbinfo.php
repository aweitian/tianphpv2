<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */
error_reporting(E_ALL);
ini_set("display_errors","On");
define("DEBUG_FLAG", true);
define("FILE_SYSTEM_ENTRY",dirname(dirname(__FILE__)));

require FILE_SYSTEM_ENTRY.'/app/runEnvir/default.php';
require FILE_SYSTEM_ENTRY."/lib/init.php";
require '../lib/db/mysql/mysqlDbInfo.php';
require '../lib/db/mysql/mysqlPdoBase.php';
// $db = new mysqlDbInfo(DB_NAME);
// var_dump($db->getTableNames());


$db = new mysqlPdoBase();
$id = $db->insert("
		insert into `aii` (`u`,`m`) values (:u,:m)
		ON DUPLICATE KEY UPDATE `m` = `m` + :m
		", array(
				"u" => 1,
				"m" => 1
		))
;
if($id==0){
	echo $db->getErrorInfo();
}else{
	var_dump($id);
}
