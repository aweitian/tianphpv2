<?php
/**
 * Date:2015年6月4日
 * Author:Awei.tian
 * Function:配置MCA从PATHINFO中获取,还是GET参数中获取
 */
#PMCAI MSG CONF
define("PMCAI_MSG_CNF_MODULE_DEFAULT","default");
define("PMCAI_MSG_CNF_CONTROL_DEFAULT","main");
define("PMCAI_MSG_CNF_ACTION_DEFAULT","welcome");

#PMCAI DISPATCHER CONF
define("PMCAI_DISPATCHER_CNF_CONTROL_NOT_FOUND",
	"hook404");/*这是一个类名,需要手动加载,要实现iControlNotFound接口*/
define("PMCAI_DISPATCHER_CNF_ACTION_SUFFIX","Action");
define("PMCAI_DISPATCHER_CNF_CONTROL_SUFFIX","Controller");
