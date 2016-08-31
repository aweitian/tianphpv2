<?php
/**
 * @author awei.tian
 * date: 2013-11-7
 * 说明:
 */
interface IController{
	//如果需要修改此函数名,修改defaultDispatcher.php中成员变量IControllerMethodName就可以
	static function _checkPrivilege(pmcaiMsg $msg,identityToken $it);
}
