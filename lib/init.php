<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */

require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IControlNotFound.php';
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IActionNotFound.php';
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IController.php';
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IDispatcher.php';
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IRoute.php';
require_once FILE_SYSTEM_ENTRY.'/lib/route/route.php';
require_once FILE_SYSTEM_ENTRY.'/lib/route/router.php';
require_once FILE_SYSTEM_ENTRY.'/lib/route/routes/pmcai/pmcaiDispatcher.php';
require_once FILE_SYSTEM_ENTRY.'/lib/identityToken/identityToken.php';
require_once FILE_SYSTEM_ENTRY.'/lib/message/message.php';
require_once FILE_SYSTEM_ENTRY.'/lib/rirResult.php';
require_once FILE_SYSTEM_ENTRY.'/lib/db/mysql/pdo.php';
require_once FILE_SYSTEM_ENTRY.'/lib/model.php';
require_once FILE_SYSTEM_ENTRY.'/lib/request/url.php';
require_once FILE_SYSTEM_ENTRY.'/lib/request/httpRequest.php';
require_once FILE_SYSTEM_ENTRY.'/lib/response/httpResponse.php';
require_once FILE_SYSTEM_ENTRY.'/lib/session/session.php';
require_once FILE_SYSTEM_ENTRY.'/lib/validate/validator.php';
require_once FILE_SYSTEM_ENTRY.'/lib/view.php';
require_once FILE_SYSTEM_ENTRY.'/lib/controller.php';
require_once FILE_SYSTEM_ENTRY.'/lib/debug.php';


#tpl path conf
defined("TPL_404_CNF_PATH")
	or define("TPL_404_CNF_PATH",FILE_SYSTEM_ENTRY."/lib/misc/404.tpl.php");
defined("TPL_MSG_CNF_PATH")
	or define("TPL_MSG_CNF_PATH",FILE_SYSTEM_ENTRY."/lib/misc/msg.tpl.php");

#PMCAI MSG CONF
defined("PMCAI_MSG_CNF_MODULE_DEFAULT") 
	or define("PMCAI_MSG_CNF_MODULE_DEFAULT","default");
defined("PMCAI_MSG_CNF_CONTROL_DEFAULT") 
	or define("PMCAI_MSG_CNF_CONTROL_DEFAULT","main");
defined("PMCAI_MSG_CNF_ACTION_DEFAULT") 
	or define("PMCAI_MSG_CNF_ACTION_DEFAULT","welcome");

#PMCAI DISPATCHER CONF
defined("PMCAI_DISPATCHER_CNF_CONTROL_NOT_FOUND") 
	or define("PMCAI_DISPATCHER_CNF_CONTROL_NOT_FOUND",
	"hook404");/*这是一个类名,需要手动加载,要实现iControlNotFound接口*/
defined("PMCAI_DISPATCHER_CNF_DEFAULT_MODULE_LOCATION") 
	or define("PMCAI_DISPATCHER_CNF_DEFAULT_MODULE_LOCATION",FILE_SYSTEM_ENTRY."/app/modules");
defined("PMCAI_DISPATCHER_CNF_ACTION_SUFFIX") 
	or define("PMCAI_DISPATCHER_CNF_ACTION_SUFFIX","Action");
defined("PMCAI_DISPATCHER_CNF_CONTROL_SUFFIX") 
	or define("PMCAI_DISPATCHER_CNF_CONTROL_SUFFIX","Controller");




