<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
define("DEBUG_FLAG", true);
define("FILE_SYSTEM_ENTRY",dirname(__FILE__));
//require_once FILE_SYSTEM_ENTRY.'/app/conf/pmcai.php';  #需要修改默认配置再加载
require_once FILE_SYSTEM_ENTRY.'/lib/tian.php';
require_once FILE_SYSTEM_ENTRY.'/app/App.php';
App::init();

App::run();
