<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:
 */
//表分COLUMNS AND INDEXS
interface ITableInfo{
	function getPk();
	/**
	 * 返回数字为键的字段名
	 */
	function getColumnNames();
	function getEngineType();
	function getComment();
}