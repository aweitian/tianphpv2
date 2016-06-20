<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */
class mysqlPdo{
	private static $pdo = null;
	private function __construct(){
		$dsn = "mysql:host=:ip;port=:port;dbname=:dbname;charset=:charset";
		$dsn = strtr($dsn,array(
			":ip" => DB_HOST,
			":port" => DB_PORT,
			":dbname" => DB_NAME,
			":charset" => DB_CHARSET
		));
		//exit($dsn);
		self::$pdo = new PDO($dsn,DB_USER,DB_PASS);
	
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