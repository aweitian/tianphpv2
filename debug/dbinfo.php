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

$db = new mysqlDbInfo(DB_NAME);
var_dump($db->getTableNames());