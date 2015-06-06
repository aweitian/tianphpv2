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
require_once LIB_PATH.'/interfaces/IDbInfo.php';
C::addAutoloadPath("IKv", LIB_PATH.'/interfaces/IKv.php');
class mysqlDbInfo implements IDbInfo{
	private $connection;
	private $dbname;
	private $cache_engine=null;
	private $cache_flag=false;
	private $prefix_kv="mysqlDbInfo.";
	private static $descriptions=null;
	public $errorInfo;
	public function __construct(PDO $connection,$dbname,$kv=null){
		$this->connection=$connection;
		$this->dbname=$dbname;
		if(!is_null($kv)){
			if(!($kv instanceof IKv)){
				throw new Exception("CACHE_HAVE_TO_IMPLEMENT_ICACHE");//(null, mysqlDbInfoException::CACHE_HAVE_TO_IMPLEMENT_ICACHE);
			}else{
				$this->cache_flag=true;
				$this->cache_engine=$kv;
			}
		}
		if(is_null(self::$descriptions))self::$descriptions=$this->getDescription();
		if(is_null(self::$descriptions)){
			throw new Exception("obtain descripton failed @ mysqlDbInfo Error:".$this->dbname);
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
		if($this->cache_flag&&is_array($result=$this->cache_engine->get($this->prefix_kv.$table))){
			return $result;
		}else{
			$sth=$this->connection->prepare("SHOW TABLE status FROM $this->dbname");
			$sth->execute();
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			$this->errorInfo=$sth->errorInfo();
			if(count($result)==0){
				return null;
			}
			if($this->cache_flag){
				$this->cache_engine->set($this->prefix_kv.$table,$result);
			}
			return $result;
		}
	}
}