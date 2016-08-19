<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */
define ( "HTTP_ENTRY", '' );

if (DEBUG_FLAG) {
	error_reporting ( E_ALL );
	ini_set ( "display_errors", "On" );
	function myErrorHandler($errno, $errstr, $errfile, $errline) {
		if (! (error_reporting () & $errno)) {
			// This error code is not included in error_reporting
			return;
		}
		
		switch ($errno) {
			case E_USER_ERROR :
				echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
				echo "  Fatal error on line $errline in file $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
				echo "Aborting...<br />\n";
				exit ( 1 );
				break;
			
			case E_USER_WARNING :
				echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
				break;
			
			case E_USER_NOTICE :
				echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
				break;
			
			default :
				debug_print_backtrace ();
				echo "Unknown error type: [$errno] $errstr<br />\n";
				break;
		}
		
		/* Don't execute PHP internal error handler */
		return true;
	}
	set_error_handler ( "myErrorHandler" );
} else {
	error_reporting ( 0 );
	ini_set ( "display_errors", "Off" );
}
if (utility::isMobile ()) {
	define("THEME", "default_m");
	#页面是否以新窗口打开
	define("TARGET_BLANK_OPEN",false);
} else {
	define("THEME", "default");
	define("TARGET_BLANK_OPEN",false);
}
// var_dump(THEME);exit;
require_once FILE_SYSTEM_ENTRY . '/app/AppConst.php';
require_once FILE_SYSTEM_ENTRY . "/lib/db/mysql/mysqlPdoBase.php";
require_once FILE_SYSTEM_ENTRY . "/modules/sqlManager/sqlManager.php";
require_once FILE_SYSTEM_ENTRY . '/app/uploadFactory.php';

require_once FILE_SYSTEM_ENTRY . '/app/AppFulltextSearch.php';
require_once FILE_SYSTEM_ENTRY . '/app/utility/pagination.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppCtrl.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppModel.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppView.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppUrl.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppUser.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppFilter.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppSms.php';
require_once FILE_SYSTEM_ENTRY . '/app/hookControllerNotFound.php';

if (false !== strpos ( FILE_SYSTEM_ENTRY, "openshift" )) {
	require_once FILE_SYSTEM_ENTRY . '/app/runEnvir/openshift.php';
} else {
	require_once FILE_SYSTEM_ENTRY . '/app/runEnvir/default.php';
}


tian::addExceptionDir ( FILE_SYSTEM_ENTRY . "/app/exceptions" );


#define("TPL_MSG_CNF_PATH",FILE_SYSTEM_ENTRY."/lib/misc/msg.tpl.php");