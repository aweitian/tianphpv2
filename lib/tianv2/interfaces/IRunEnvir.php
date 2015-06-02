<?php
/**
 * @author: awei.tian
 * @date: 2013-11-10
 * @function:
 */
interface IRunEnvir{
	/**
	 * @return ICache
	 */
	function getCache();
	/**
	 * @return IDb
	 */
	function getDb();
	/**
	 * @return IKv
	 */
	function getKv();
}