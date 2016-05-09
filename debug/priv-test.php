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
require FILE_SYSTEM_ENTRY."/lib/tian.php";
require FILE_SYSTEM_ENTRY."/lib/init.php";
require FILE_SYSTEM_ENTRY."/modules/priv/priv.php";
require FILE_SYSTEM_ENTRY."/lib/db/mysql/mysqlPdoBase.php";



$priv = new priv(new session());
$f = $priv->check("awei.tian@qq.com","002002");
var_dump($f);
$f = $priv->check("awei.tian@qq.com","007007");
var_dump($f);
