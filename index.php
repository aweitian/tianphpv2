<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
define("ENTRY_PATH",dirname(__FILE__));
require_once 'lib/tianv2/tian.php';
require_once 'app/App.php';
if(false !== strpos(ENTRY_PATH, "openshift")){
	
	App::init("openshift");	
}else{
	
	App::init("default");
}

App::run();
