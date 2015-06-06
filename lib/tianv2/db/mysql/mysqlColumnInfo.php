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
require_once LIB_PATH.'/interfaces/IColumnInfo.php';
C::addAutoloadPath("mysqlColumnInfoException", LIB_PATH."/db/mysql/mysqlColumnInfoException.php");
C::addAutoloadPath("IKv", LIB_PATH.'/interfaces/IKv.php');
class mysqlColumnInfo implements IColumnInfo{
	private $connection;
	private $tabname;
	private $columnname;
	private $cache_engine=null;
	private $cache_flag=false;
	private $prefix_kv="mysqlColumnInfo.";
	/**
	 * 格式是以列名为键值的数组
	 */
	private static $descriptions=array();
	/**
	 * 
	 * Enter description here ...
	 * @param PDO $connection
	 * @param unknown_type $tabname
	 * @param unknown_type $columnname
	 * @param USECACHE $flag
	 */
	public function __construct(PDO $connection,$tabname,$columnname,$kv=null){
		$this->connection=$connection;
		$this->columnname=$columnname;
		if(!is_null($kv)){
			if(!($kv instanceof IKv)){
				throw new mysqlColumnInfoException(null, mysqlColumnInfoException::CACHE_HAVE_TO_IMPLEMENT_ICACHE);
			}else{
				$this->cache_flag=true;
				$this->cache_engine=$kv;
			}
		}
		$this->setTableName($tabname);
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
		if($this->cache_flag&&is_array($result=$this->cache_engine->get($this->prefix_kv.$table))){
			return $result;
		}else{
			$sth=$this->connection->prepare("SHOW FULL COLUMNS FROM `$this->tabname`");
			$sth->execute();
			$res=$sth->fetchAll(PDO::FETCH_ASSOC);
			$result=array();
			foreach ($res as $v){
				$result[$v["Field"]]=$v;
			}
			if($this->cache_flag){
				$this->cache_engine->set($this->prefix_kv.$table,$result);
			}
			return $result;
		}
	}
}