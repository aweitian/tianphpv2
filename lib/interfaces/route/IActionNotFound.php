<?php
/**
 * @author awei.tian
 * date: 2013-11-7
 * 说明:
 */
interface IActionNotFound{
	//如果需要修改此函数名,修改defaultDispatcher.php中成员变量IActionNotFoundMethodName就可以
	function _action_not_found(pmcaiMsg $msg);
}