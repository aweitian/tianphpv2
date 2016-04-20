<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
error_reporting(E_ALL);
ini_set("display_errors","On");
define("FILE_SYSTEM_ENTRY",dirname(__DIR__));
require "../modules/sqlManager/sqlManager.php";
$test = new sqlManager("test");
echo ($test->getSql("/note/to"));
