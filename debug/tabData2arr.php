<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 */
error_reporting(E_ALL);
ini_set("display_errors","On");
require_once '../app/utility/tabDataToArray.php';
require_once '../lib/rirResult.php';
echo '<meta charset="utf-8">';

$demo = new tabDataToArray(file_get_contents("tabdata/1.txt"));
$ret = $demo->parse();
if($ret->isTrue()){
	var_dump($ret->return);
}else{
	echo $ret->info;
}


$demo = new tabDataToArray(file_get_contents("tabdata/2.txt"));
$ret = $demo->parse();
if($ret->isTrue()){
	var_dump($ret->return);
}else{
	echo $ret->info;
}



$demo = new tabDataToArray(file_get_contents("tabdata/3.txt"));
$ret = $demo->parse();
if($ret->isTrue()){
	var_dump($ret->return);
}else{
	echo $ret->info;
}