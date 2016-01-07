<?php
/**
 * Date:2015年6月4日
 * Author:Awei.tian
 * Function:
 */
require_once '../../lib/tian.php';
require_once 'lib/message/message.php';
$demo = new message(new httpRequest());

if($demo->isPost()){
	var_dump($demo["aa"],$demo["?get"]);
	$demo["aa"] = "new";
	$demo["?get"] = "aed";
	var_dump($demo["aa"],$demo["?get"]);
}else{
	include dirname(__FILE__)."/message/form.tpl.php";
}
