<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:
 */
interface IColumnInfo{
	function getType();
	function getLen();
	function isNull();
	function isPk();
	function isAutoIncrement();
	function isUnique();
	function getDefault();
	function getComment();
}