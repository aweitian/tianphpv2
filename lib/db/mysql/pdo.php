<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */
class mysqlPdo{
	private static $pdo = null;
	private function __construct(){
		$dsn = "mysql:host=:ip;port=:port;dbname=:dbname";
		$dsn = strtr($dsn,array(
			":ip" => DB_HOST,
			":port" => DB_PORT,
			":dbname" => DB_NAME
		));
		//exit($dsn);
		self::$pdo = new PDO($dsn,DB_USER,DB_PASS,array("PDO::MYSQL_ATTR_INIT_COMMAND=set names ".DB_CHARSET));
	
	}
	/**
	 * @return PDO
	 */
	static public function getConnection(){
		if(is_null(self::$pdo)){
			new self();
		}
		return self::$pdo;
	}
}