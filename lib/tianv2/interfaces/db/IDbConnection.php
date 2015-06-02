<?php
/**
 * @author:awei.tian
 * @date:2013-12-11
 * @functions:
 */
interface IDbConnection{
	/**
	 * @return PDO
	 */
	public function getConnection();
	public function getHost();
	public function getDbname();
}