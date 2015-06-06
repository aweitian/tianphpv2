<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:
 */
interface IPdoBase{
	/**
	 * ErrorCode
	 * 返回0000 正常
	 */
	function getErrorCode();
	/**
	 * ErrorInfo
	 * 0 SQLSTATE error code (a five characters alphanumeric identifier defined in the ANSI SQL standard). 
	 * 1 Driver specific error code. 
	 * 2 Driver specific error message. 
	 */
	function getErrorInfo();
	/**
	 * 
	 * 返回INSERT ID
	 */
	function insert($sql,$data);
	/**
	 * 返回第一行数组，没有结果集就为空数组
	 */
	function fetch($sql,$data,$fetch_mode=PDO::FETCH_ASSOC);
	/**
	 * 返回数组，没有结果集就为空数组
	 */
	function fetchAll($sql,$data,$fetch_mode=PDO::FETCH_ASSOC);
	/**
	 * 返回影响的行数
	 */
	function exec($sql,$data);
	/**
	 * 判断是不是操作没有数据改变
	 */
	function hasAffected();
}