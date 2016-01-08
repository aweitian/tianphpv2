<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/lib/route/route.php';
require_once FILE_SYSTEM_ENTRY.'/lib/route/router.php';
require_once FILE_SYSTEM_ENTRY.'/lib/route/routes/pmcai/pmcaiDispatcher.php';
require_once FILE_SYSTEM_ENTRY.'/lib/identityToken/identityToken.php';
require_once FILE_SYSTEM_ENTRY.'/lib/message/message.php';
require_once FILE_SYSTEM_ENTRY.'/lib/model.php';
require_once FILE_SYSTEM_ENTRY.'/lib/request/url.php';
require_once FILE_SYSTEM_ENTRY.'/lib/request/httpRequest.php';
require_once FILE_SYSTEM_ENTRY.'/lib/response/httpResponse.php';
require_once FILE_SYSTEM_ENTRY.'/lib/session/session.php';
require_once FILE_SYSTEM_ENTRY.'/lib/validate/validator.php';
require_once FILE_SYSTEM_ENTRY.'/lib/view.php';
require_once FILE_SYSTEM_ENTRY.'/lib/controller.php';
require_once FILE_SYSTEM_ENTRY.'/lib/debug.php';


#PMCAI MSG CONF
define("PMCAI_MSG_CNF_MODULE_DEFAULT","default");
define("PMCAI_MSG_CNF_CONTROL_DEFAULT","main");
define("PMCAI_MSG_CNF_ACTION_DEFAULT","welcome");

#PMCAI DISPATCHER CONF
define("PMCAI_DISPATCHER_CNF_CONTROL_NOT_FOUND","hook404");/*这是一个类名,需要手动加载,要实现iControlNotFound接口*/
define("PMCAI_DISPATCHER_CNF_DEFAULT_MODULE_LOCATION",FILE_SYSTEM_ENTRY."/app/modules");
define("PMCAI_DISPATCHER_CNF_ACTION_SUFFIX","Action");
define("PMCAI_DISPATCHER_CNF_CONTROL_SUFFIX","Controller");




