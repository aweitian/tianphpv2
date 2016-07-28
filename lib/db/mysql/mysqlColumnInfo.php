<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:
 */
//+------------+---------------+-----------------+------+-----+---------+----------------+---------------------------------+----------+
//| Field      | Type          | Collation       | Null | Key | Default | Extra          | Privileges                      | Comment  |
//+------------+---------------+-----------------+------+-----+---------+----------------+---------------------------------+----------+
//| sid        | int(2)        | NULL            | NO   | PRI | NULL    | auto_increment | select,insert,update,references | SID      |
//| ico        | varbinary(78) | NULL            | NO   |     | NULL    |       		 | select,insert,update,references | 图片     	  |
//| content    | text          | utf8_unicode_ci | NO   |     | NULL    |      		 	 | select,insert,update,references | 内容              |
//| order      | int(2)        | NULL            | NO   | UNI | 0       |      			 | select,insert,update,references | 排序       	  |
//| updatetime | datetime      | NULL            | NO   |     | NULL    |       		 | select,insert,update,references | 更新时间    |
//+------------+---------------+-----------------+------+-----+---------+----------------+---------------------------------+----------+
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/db/IColumnInfo.php';
class mysqlColumnInfo implements IColumnInfo{
	private $connection;
	private $tabname;
	private $columnname;
	/**
	 * 格式是以列名为键值的数组
	 */
	private static $descriptions=array();
	/**
	 * 
	 * Enter description here ...
	 * @param string $tabname
	 * @param string $columnname
	 */
	public function __construct($tabname,$columnname){
		$this->connection=mysqlPdo::getConnection();
		$this->columnname=$columnname;
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
		self::$descriptions = array();
	}
	private function setTableName($tab){
		if($tab=="")return ;
		$this->tabname=$tab;
		if(!array_key_exists($tab,self::$descriptions)){
			$ret=$this->getTableDecription();
			if(!is_null($ret))self::$descriptions[$tab]=$ret;
		}
		return $this;
	}
	/**
	 * @param getType的返回值 $typename
	 */
	public static function getPdoParamType($type){
		switch($type){
			case "tinyint":
			case "smallint":
			case "int":
			case "bigint":
			case "float":
			case "double":
			case "decimal":
			case "mediumint":
				return PDO::PARAM_INT;
			case "text":
			case "tinyblob":
			case "tinytext":
			case "blob":
			case "mediumblob":
			case "mediumtext":
			case "longblob":
			case "longtext":	
			case "datetime":
			case "timestamp":
			case "date":
			case "time":
			case "year":
			case "enum":
			case "set":
			case "varchar":
			case "char":
				return PDO::PARAM_STR;
				
			case "binary":
			case "varbinary":
				return PDO::PARAM_LOB;
			default:
				return PDO::PARAM_STR;
		}
	} 
	/**
	 * 返回像这样set,enum,binary,int
	 * 
	 */
	public function getType(){
		$ret=$this->_split_typelen(self::$descriptions[$this->tabname][$this->columnname]["Type"]);
		return $ret["type"];
	}
	public function getLen(){
		$ret=$this->_split_typelen(self::$descriptions[$this->tabname][$this->columnname]["Type"]);
		return $ret["len"];
	}
	public function isNull(){
		return self::$descriptions[$this->tabname][$this->columnname]["Null"]==='YES';
	}
	public function getDefault(){
		return self::$descriptions[$this->tabname][$this->columnname]["Default"];
	}
	public function getComment(){
		return self::$descriptions[$this->tabname][$this->columnname]["Comment"];
	}
	public function isPk(){
		return self::$descriptions[$this->tabname][$this->columnname]["Key"]==='PRI';
	}
	public function isAutoIncrement(){
		return self::$descriptions[$this->tabname][$this->columnname]["Extra"]==='auto_increment';
	}
	public function isUnique(){
		return self::$descriptions[$this->tabname][$this->columnname]["Key"]==='UNI';
	}
	public function getRawDescription(){
		return self::$descriptions[$this->tabname];
	}
	private function _split_typelen($t){
		if(preg_match("/^[a-z]+$/",$t)){
			return array(
				'type' => $t,
				'len' => null
			);
		}else if(preg_match("/^([a-z]+)\(([^\)]+)\)$/",$t,$matches)){
			return array(
				'type' => $matches[1],
				'len' => str_replace("'","",$matches[2])
			);
		} else if (preg_match("/^([a-z]+)\((\d+)\) unsigned$/",$t,$matches)) {
			return array(
					'type' => $matches[1],
					'len' => $matches[2]
			);
		}else{
			return array(
				'type' => null,
				'len' => null
			);
		}
	}	
	private function _getFields($name="Field",$field=null){
		$k = array();
		foreach(self::$descriptions as $val){
			$k[$val["Field"]] = $name==="Null" ? $val[$name] === "YES":$val[$name];
		}
		if(!is_null($field) && array_key_exists($field,$k)){
			return $k[$field];	
		}
		return $name==="Field" ? array_values($k) : $k;
	}
	protected function getTableDecription(){
		$sth=$this->connection->prepare("SHOW FULL COLUMNS FROM `$this->tabname`");
		$sth->execute();
		$res=$sth->fetchAll(PDO::FETCH_ASSOC);
		$result=array();
		foreach ($res as $v){
			$result[$v["Field"]]=$v;
		}
		return $result;
	}
}