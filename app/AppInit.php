<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */
define("HTTP_ENTRY",'');


if(false !== strpos(FILE_SYSTEM_ENTRY, "openshift")){
	require_once FILE_SYSTEM_ENTRY.'/app/runEnvir/openshift.php';
}else{
	require_once FILE_SYSTEM_ENTRY.'/app/runEnvir/default.php';
}

if(DEBUG_FLAG){
	error_reporting(E_ALL);
	ini_set("display_errors","On");
}else{
	error_reporting(0);
	ini_set("display_errors","Off");
}
