<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:根据数据库名获取表名，表的存储引擎
 */
//SHOW TABLE status FROM tiandb;
// +-----------------+--------+---------+------------+------+----------------+-------------+-----------------+--------------+------------+----------------+---------------------+---------------------+------------+-----------------+----------+----------------+---------+
// | Name            | Engine | Version | Row_format | Rows | Avg_row_length | Data_length | Max_data_length | Index_length | Data_free  | Auto_increment | Create_time         | Update_time         | Check_time | Collation       | Checksum | Create_options | Comment |
// +-----------------+--------+---------+------------+------+----------------+-------------+-----------------+--------------+------------+----------------+---------------------+---------------------+------------+-----------------+----------+----------------+---------+
// | ccc             | NULL   |    NULL | NULL       | NULL |           NULL |        NULL |            NULL |         NULL |       NULL |           NULL | NULL                | NULL                | NULL       | NULL            |     NULL | NULL           | VIEW    |
// | demo_crud       | InnoDB |      10 | Compact    |    2 |           8192 |       16384 |               0 |            0 | 1849688064 |              3 | 2013-11-12 15:53:37 | NULL                | NULL       | utf8_unicode_ci |     NULL |                |         |
// | key_value_cache | MyISAM |      10 | Dynamic    |    1 |             28 |          96 | 281474976710655 |         7168 |         68 |           NULL | 2013-09-30 14:44:41 | 2013-09-30 15:08:11 | NULL       | utf8_general_ci |     NULL |                |         |
// | key_value_pair  | MyISAM |      10 | Dynamic    |    2 |             30 |          60 | 281474976710655 |         7168 |          0 |           NULL | 2013-09-30 13:34:06 | 2013-11-14 11:10:43 | NULL       | utf8_general_ci |     NULL |                |         |
// +-----------------+--------+---------+------------+------+----------------+-------------+-----------------+--------------+------------+----------------+---------------------+---------------------+------------+-----------------+----------+----------------+---------+
require_once 'lib/interfaces/db/IDbInfo.php';
class mysqlDbInfo implements IDbInfo{
	private $connection;
	private $dbname;
	private static $descriptions=null;
	public $errorInfo;
	public function __construct($dbname){
		$this->connection=tian::$pdo;
		$this->dbname=$dbname;
		if(is_null(self::$descriptions))self::$descriptions=$this->getDescription();
		if(is_null(self::$descriptions)){
			tian::throwException("73e1");
			return ;
		}
	}
	public function getTableNames(){
		$ret=array();
		foreach (self::$descriptions as $data){
			if($data["Comment"]!=="VIEW")$ret[]=$data["Name"];
		}
		return $ret;
	}
	public function getRawDescription(){
		return self::$descriptions;
	}
	/**
	 * 包括VIEW
	 */
	public function getFullTableNames(){
		$ret=array();
		foreach (self::$descriptions as $data){
			$ret[]=$data["Name"];
		}
		return $ret;
	}
	public function tableExists($tabname){
		$hash=$this->getTableNames();
		return in_array($tabname, $hash);
	}
	protected function getDescription(){
		$sth=$this->connection->prepare("SHOW TABLE status FROM $this->dbname");
		$sth->execute();
		$result=$sth->fetchAll(PDO::FETCH_ASSOC);
		$this->errorInfo=$sth->errorInfo();
		if(count($result)==0){
			if($this->errorInfo[0] == "00000"){
				return array();
			}
			return null;
		}
		return $result;
	}
}