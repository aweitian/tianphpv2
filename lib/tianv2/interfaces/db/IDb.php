<?php
/**
 * @author:awei.tian
 * @date:2013-12-11
 * @functions:
 */
require_once dirname(__FILE__)."/IPdoBase.php";
require_once dirname(__FILE__)."/IDbInfo.php";
require_once dirname(__FILE__)."/ITableInfo.php";
require_once dirname(__FILE__)."/IColumnInfo.php";

interface IDb{
	/**
	 * @return IPdoBase
	 */
	public function getPdoBase();
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