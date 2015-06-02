<?php
/**
 * @author:awei.tian
 * @date:2013-12-11
 * @functions:
 */
require dirname(__FILE__)."/IPdoBase.php";
require dirname(__FILE__)."/IDbConnection.php";
require dirname(__FILE__)."/IDbInfo.php";
require dirname(__FILE__)."/ITableInfo.php";
require dirname(__FILE__)."/IColumnInfo.php";

interface IDb{
	/**
	 * @return IPdoBase
	 */
	public function getPdoBase();
	/**
	 * @return IDbConnection
	 */
	public function getDbConnection();
	/**
	 * @return IDbInfo
	 */
	public function getDbInfo();
	/**
	 * @return ITableInfo
	 */
	public function getTableInfo($tabname,$kv=null);
	/**
	 * @return IColumnInfo
	 */
	public function getColumnInfo($tabname, $columnname,$kv=null);
}