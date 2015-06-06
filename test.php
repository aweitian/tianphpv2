<?php
/**
 * Date:2015年6月3日
 * Author:Awei.tian
 * Function:
 */
error_reporting(E_ALL);
ini_set("display_errors","On");
require_once 'app/runEnvir/openshift.php';
$pdo = new PDO('mysql:host=localhost;dbname='.DB_NAME,DB_USER,DB_PASS);
var_dump($pdo);

