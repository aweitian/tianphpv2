<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
// $pagestartime=microtime();


// var_dump($_SERVER["HTTP_HOST"]);
if ($_SERVER["HTTP_HOST"] == "192.168.1.48") {
	define("DEBUG_FLAG", true);
} else {
	define("DEBUG_FLAG", false);
}


define("FILE_SYSTEM_ENTRY",dirname(dirname(__FILE__)));
//require_once FILE_SYSTEM_ENTRY.'/app/conf/pmcai.php';  #需要修改默认配置再加载
require_once FILE_SYSTEM_ENTRY.'/lib/tian.php';
require_once FILE_SYSTEM_ENTRY.'/app/App.php';
App::init();

App::run();



// $pageendtime = microtime();
// $starttime = explode(" ",$pagestartime);
// $endtime = explode(" ",$pageendtime);
// $totaltime = $endtime[0]-$starttime[0]+$endtime[1]-$starttime[1];
// $timecost = sprintf("%s",$totaltime);
// echo "<!--页面运行时间: $timecost 秒-->";