<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */
define ( "HTTP_ENTRY", '' );
if ($_SERVER ["HTTP_HOST"] == "192.168.1.48") {
	if (isset ( $_COOKIE ["debug_swt_off"] ) && $_COOKIE ["debug_swt_off"] == '1') {
		define ( "SWT_OPEN", FALSE );
	} else {
		define ( "SWT_OPEN", true );
	}
} else {
	define ( "SWT_OPEN", true );
}
//APP CHANNEL
require_once FILE_SYSTEM_ENTRY . '/app/conf/channel.php';


if (DEBUG_FLAG) {
	error_reporting ( E_ALL );
	ini_set ( "display_errors", "On" );
	set_error_handler ( array (
			"App",
			"myErrorHandler" 
	) );
	define ( "APP_MOBILE_MODE", utility::isMobile () );
	define ( "TARGET_BLANK_OPEN", false );
	require_once FILE_SYSTEM_ENTRY . '/app/runEnvir/default.php';
	if (APP_MOBILE_MODE) {
		define ( "THEME", "default_m" );
	} else {
		define ( "THEME", "default" );
	}
} else {
	error_reporting ( 0 );
	ini_set ( "display_errors", "Off" );
	require_once FILE_SYSTEM_ENTRY . '/app/runEnvir/online.php';
	
	if (AppChannel::isDeviceM()) {
		define ( "THEME", "default_m" );
		define ( "APP_MOBILE_MODE", true );
	} else {
		define ( "THEME", "default" );
		define ( "APP_MOBILE_MODE", false );
	}
}

// if ($_SERVER ["HTTP_HOST"] == "hospital.cs999.cn" && utility::isMobile ()) {
// 	if (isset ( $_SERVER ['REQUEST_URI'] )) {
// 		header ( "location:http://3g.hospital.cs999.cn" . $_SERVER ['REQUEST_URI'] );
// 	} else {
// 		header ( "location:http://3g.hospital.cs999.cn" );
// 	};
// 	exit ();
// }








// var_dump(THEME);exit;
require_once FILE_SYSTEM_ENTRY . '/app/AppConst.php';
require_once FILE_SYSTEM_ENTRY . "/lib/db/mysql/mysqlPdoBase.php";
require_once FILE_SYSTEM_ENTRY . "/modules/sqlManager/sqlManager.php";
require_once FILE_SYSTEM_ENTRY . '/app/uploadFactory.php';

require_once FILE_SYSTEM_ENTRY . '/app/AppFulltextSearch.php';
require_once FILE_SYSTEM_ENTRY . '/app/utility/pagination.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppCtrl.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppModule.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppModel.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppView.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppUrl.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppUser.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppFilter.php';
require_once FILE_SYSTEM_ENTRY . '/app/AppSms.php';
require_once FILE_SYSTEM_ENTRY . '/app/hookControllerNotFound.php';



tian::addExceptionDir ( FILE_SYSTEM_ENTRY . "/app/exceptions" );


#define("TPL_MSG_CNF_PATH",FILE_SYSTEM_ENTRY."/lib/misc/msg.tpl.php");