<?php
/**
 * Date:2015年6月4日
 * Author:Awei.tian
 * Function:
 */

define("FILESYSTEM_ENTRY_POINT",dirname(dirname(dirname(__FILE__))));
set_include_path(FILESYSTEM_ENTRY_POINT.PATH_SEPARATOR.get_include_path());
require_once 'lib/tianv2/tian.php';
require_once 'app/App.php';
App::init();

$demo = App::$db;
//CREATE TABLE `tpv2`.`demo`( `sid` INT UNSIGNED NOT NULL AUTO_INCREMENT, `a` VARCHAR(20), PRIMARY KEY (`sid`) ) ENGINE=INNODB CHARSET=utf8;
//var_dump(App::getDbInfo()->getTableNames()); //test ok


// $sid = $demo->insert("insert into `demo` (`a`) values ('aa')", array());
// var_dump($sid); //test ok return 1


// $rows = $demo->exec("delete from `demo` where `sid`=:sid",array(
// 	"sid" => 1
// ));
// var_dump($rows); //rest ok,return 1





// $sid = $demo->insert("insert into `demo` (`a`) values ('bb')", array());
// var_dump($sid); //test ok return 2

// $rows = $demo->exec("update `demo` set `a` = :a where `sid`=:sid",array(
// 	"sid" => 2,
// 	"a" => "new bb"
// ));
// var_dump($rows); //rest ok,return 1


// $data = $demo->fetch("select * from `demo`",array());
// var_dump($data);//array(2) { ["sid"]=> string(1) "2" ["a"]=> string(6) "new bb" }
