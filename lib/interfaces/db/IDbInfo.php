<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:获取数据库信息接口
 */
interface IDbInfo{
	function getTableNames();
	//视图，存储过程，函数，触发器，事件
	//暂时用不着就不写了
	function tableExists($tabname);
}