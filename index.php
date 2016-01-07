<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
define("DEBUG_FLAG", TRUE);
define("FILE_SYSTEM_ENTRY",dirname(__FILE__));

require_once FILE_SYSTEM_ENTRY.'/lib/tian.php';
require_once FILE_SYSTEM_ENTRY.'/app/App.php';
App::init();

App::run();
