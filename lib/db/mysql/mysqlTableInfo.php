<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:
 */
// show table status from amzphp where name='ebank';
//+-------+--------+---------+------------+------+----------------+-------------+-----------------+--------------+-----------+----------------+---------------------+---------------------+------------+-----------------+----------+----------------+----------+
//| Name  | Engine | Version | Row_format | Rows | Avg_row_length | Data_length |Max_data_length  | Index_length | Data_free | Auto_increment | Create_time         | Update_time         | Check_time | Collation       | Checksum | Create_options | Comment  |
//+-------+--------+---------+------------+------+----------------+-------------+-----------------+--------------+-----------+----------------+---------------------+---------------------+------------+-----------------+----------+----------------+----------+
//| ebank | MyISAM |      10 | Dynamic    |    3 |           1586 |        4760 |281474976710655  |         2048 |         0 |              4 | 2013-09-14 14:37:58 | 2013-09-14 14:44:19 | NULL       | utf8_unicode_ci |     NULL |                | 电子银行     |
//+-------+--------+---------+------------+------+----------------+-------------+-----------------+--------------+-----------+----------------+---------------------+---------------------+------------+-----------------+----------+----------------+----------+

//SHOW COLUMNS FROM device_info
// +-------+-------------+------+-----+---------+----------------+
// | Field | Type        | Null | Key | Default | Extra          |
// +-------+-------------+------+-----+---------+----------------+
// | sid   | int(11)     | NO   | PRI | NULL    | auto_increment |
// | vv    | varchar(50) | YES  |     | NULL    |                |
// +-------+-------------+------+-----+---------+----------------+
require_once 'lib/interfaces/db/ITableInfo.php';
class mysqlTableInfo implements ITableInfo{
	/**
	 * Enter description here ...
	 * @var PDO
	 */
	private $connection;
	private $tabname;

	private static $descriptions=array();
	private static $key_descriptions=array();
	
	public function __construct($tabname){
		$this->connection=$connection;
		$this->init($tabname);
	}
	/**
	 * 
	 * @param string $tabname
	 * 用于调用clearCache后调用
	 */
	public function init($tabname){
		$this->setTableName($tabname);
	}
	public function clearCache(){
		mysqlTableInfo::$descriptions = array();
		mysqlTableInfo::$key_descriptions = array();
	}
	private function setTableName($tab){
		if($tab=="")return ;
		$this->tabname=$tab;
		if(!array_key_exists($tab,self::$key_descriptions)){
			$ret=$this->getTableKeyDecription();
			if($ret!=null)self::$key_descriptions[$tab]=$ret;
		}
		if(!array_key_exists($tab,self::$descriptions)){
			$ret=$this->getTableDecription();
			if(!is_null($ret))self::$descriptions[$tab]=$ret;
		}
		if(!array_key_exists($tab,self::$descriptions)){
			tian::throwException("73e0");
			return ;
		}
	}
	public function getPk(){
		foreach (self::$key_descriptions[$this->tabname] as $val){
			if($val["Key"]=="PRI")return $val["Field"];
		}
		return null;
	}
	/**
	 * (non-PHPdoc)
	 * @see ITableInfo::getColumnNames()
	 */
	public function getColumnNames(){
		$ret=array();
		if(!isset(self::$key_descriptions[$this->tabname])||!is_array(self::$key_descriptions[$this->tabname])){
			return "";
		}
		foreach (self::$key_descriptions[$this->tabname] as $val){
			$ret[]=$val["Field"];
		}
		return $ret;
	}
	public function getEngineType(){
		return self::$descriptions[$this->tabname]["Engine"];
	}
	public function getComment(){
		return self::$descriptions[$this->tabname]["Comment"];
	}
	public function getRawResult(){
		return self::$descriptions[$this->tabname];
	}
	public function getRawKeyResult(){
		return self::$key_descriptions[$this->tabname];
	}
	protected function getTableDecription(){
		$sth=$this->connection->prepare("show table status from ".$this->connection->getDbname()." where name=:tablename");
		$sth->execute(array("tablename"=>$this->tabname));
		$result=$sth->fetchAll(PDO::FETCH_ASSOC);
		if(count($result)!=1){
			return null;
		}
		$result=$result[0];
		return $result;

	}	
	protected function getTableKeyDecription(){
		$sth=$this->connection->prepare("SHOW COLUMNS FROM $this->tabname");
		$sth->execute();
		$result=$sth->fetchAll(PDO::FETCH_ASSOC);
		if(count($result)==0){
			return null;
		}
		return $result;
	}	
}