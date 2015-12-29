<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
define("FILESYSTEM_ENTRY_POINT",dirname(__FILE__));
define("HTTP_ENTRY_POINT",'');
require_once 'lib/tianv2/tian.php';
require_once 'app/App.php';
App::init();

App::run();
