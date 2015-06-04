<?php
/**
 * Date:2015年6月4日
 * Author:Awei.tian
 * Function:
 */
require_once '../../lib/tianv2/tian.php';
require_once 'lib/tianv2/route/routes/default/match/pmcaiUrl.php';
$demo = new pmcaiUrl("http://localhost/a/b/c/d/e","ca");
var_dump($demo->getPreurl(),$demo->getModule(),$demo->getControl(),$demo->getAction(),$demo->getInfo());