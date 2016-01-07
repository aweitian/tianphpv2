<?php
/**
 * Date:2015年6月4日
 * Author:Awei.tian
 * Function:
 */
require_once '../../lib/tian.php';
require_once '../../lib/route/routes/default/pmcaiUrl.php';
$demo = new pmcaiUrl("http://localhost/a/b/c/d/e","ca");
//var_dump($demo->getPreurl(),$demo->getModule(),$demo->getControl(),$demo->getAction(),$demo->getInfo());
// $demo->setQuery("abc", "abc_value");
// print $demo->getUrl();//a/b/c/d/e?abc=abc_value
// print "<br>".$demo->getAction();//b

$demo = new pmcaiUrl("http://localhost/a/b/c/d/e?taw=00&qq=122","ca");
$demo->_setConfig(array(
	"mode" => "get",
	"module" => "_m",	
	"moduleDefault" => "default",
	"controlDefault" => "main",
	"actionDefault" => "welcome",
	"control" => "_c",	
	"action" => "_a",	
	
));
print "<br>".$demo->getAction()."<br>";//welcome
$demo->setAction("act");
$demo->removeQuery("qq");
$demo->setQuery("abc", "abc_value");
print $demo->getUrl();
print "<br>".$demo->getControl();