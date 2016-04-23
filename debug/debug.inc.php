<?php
/**
 * Date: Apr 21, 2016
 * Author: Awei.tian
 * Description: 
 */
define("DEBUG_FLAG", true);

error_reporting(E_ALL);
ini_set("display_errors","On");


define("FILE_SYSTEM_ENTRY",dirname(__DIR__));

require_once FILE_SYSTEM_ENTRY.'/app/runEnvir/default.php';
require_once FILE_SYSTEM_ENTRY.'/lib/db/mysql/mysqlPdoBase.php';
require FILE_SYSTEM_ENTRY . "/lib/tian.php";

