<?php
/**
 * @author awei.tian
 * date: 2013-8-10
 * 说明:MYSQL PDO 最基本的操作
 * 此为默认模式。 PDO 将只简单地设置错误码，
 * 可使用 PDO::errorCode() 和 PDO::errorInfo() 方法来检查语句和数据库对象。
 * 如果错误是由于对语句对象的调用而产生的，那么可以调用那个对象的 
 * PDOStatement::errorCode() 或 PDOStatement::errorInfo() 方法。
 * 如果错误是由于调用数据库对象而产生的，那么可以在数据库对象上调用上述两个方法
 * 
 */
define("MAX_RESULT_RETURN",500);
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/db/IPdoBase.php';
require_once FILE_SYSTEM_ENTRY.'/lib/db/mysql/PHPVarType2PDOBindType.php';
require_once FILE_SYSTEM_ENTRY.'/lib/db/mysql/sqlExpression.php';
class mysqlPdoBase implements IPdoBase{
	const ERROR_EXCEED_LIMIT_COUNT = 0x1e7d;
	private $connection;
	private $errorInfo;//string
	private $errorCode;//code
	const NONERRCODE = "00000";
	public function __construct(){
		$this->connection = mysqlPdo::getConnection();
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	}
	/**
	 * @return string
	 */
	public function getErrorInfo(){
		return $this->errorInfo;
	}
	public function getErrorCode(){
		return $this->errorCode;
	}
	public function hasError(){
		return $this->getErrorCode() !== self::NONERRCODE;
	}
	public function resetErr(){
		$this->errorCode = self::NONERRCODE;
		$this->errorInfo = "";
	}
	/**
	 * 
	 * @return last insert into id
	 * @param string $sql
	 * @param array $data
	 */
	public function insert($sql,$data){
		$this->resetErr();
		$this->_parse_sqlExpression($sql, $data);
		$sth=$this->connection->prepare($sql);
		if(!$sth){
			$this->errorInfo=$this->connection->errorInfo();
			$this->errorInfo=$this->errorInfo[2];
			$this->errorCode=$this->connection->errorCode();
			return 0;
		}
		foreach ($data as $k=>$v){
			$sth->bindValue($k, $v,PHPVarType2PDOBindType::convert($v));
		}
		if($sth->execute()){
			$id=$this->connection->lastInsertId();
			return $id;
		}else{
			$this->errorInfo=$sth->errorInfo();
			$this->errorInfo=$this->errorInfo[2];
			$this->errorCode=$sth->errorCode();
			return 0;
		}
	}
	/**
	 * 
	 * @return array;
	 * @param string $sql
	 * @param array $data
	 */
	public function fetch($sql,$data,$fetch_mode=PDO::FETCH_ASSOC){
		$this->resetErr();
		$this->_parse_sqlExpression($sql, $data);
		$sth=$this->connection->prepare($sql);
		if(!$sth){
			$this->errorInfo=$this->connection->errorInfo();
			$this->errorInfo=$this->errorInfo[2];
			$this->errorCode=$this->connection->errorCode();
			return array();
		}
		foreach ($data as $k=>$v){
			$sth->bindValue($k, $v,PHPVarType2PDOBindType::convert($v));
		}
		$sth->setFetchMode($fetch_mode);
		if($sth->execute()){
			$ret=$sth->fetch();
			if(!is_array($ret))return array();
			return $ret;
		}
		$this->errorInfo=$sth->errorInfo();
		$this->errorInfo=$this->errorInfo[2];
		$this->errorCode=$sth->errorCode();
		return 0;
	}
	
	/**
	 * 
	 * @return array;
	 * @param string $sql
	 * @param array $data
	 */
	public function fetchAll($sql,$data,$fetch_mode=PDO::FETCH_ASSOC){
		$this->resetErr();
		$this->_parse_sqlExpression($sql, $data);
		$sth=$this->connection->prepare($sql);
		if(!$sth){
			$this->errorInfo=$this->connection->errorInfo();
			$this->errorInfo=$this->errorInfo[2];
			$this->errorCode=$this->connection->errorCode();
			return array();
		}
		foreach ($data as $k=>$v){
			$sth->bindValue($k, $v,PHPVarType2PDOBindType::convert($v));
		}
		$sth->setFetchMode($fetch_mode);
		if($sth->execute()){
			$r=$sth->fetchAll();
			if(count($r)>MAX_RESULT_RETURN){
				$this->errorInfo='Return data exceed the limit '.MAX_RESULT_RETURN
				.',revise the number @ LIB_PATH/db/mysql/mysqlPdoBase.php'
						;
						$this->errorCode=self::ERROR_EXCEED_LIMIT_COUNT;
						return array();
			}
			return $r;
		}
		$this->errorInfo=$sth->errorInfo();
		$this->errorInfo=$this->errorInfo[2];
		$this->errorCode=$sth->errorCode();
		return array();
	}
	/**
	 * 
	 * @return affected rows
	 * @param string $sql
	 * @param array $data
	 */
	public function exec($sql,$data){
		$this->resetErr();
		$this->_parse_sqlExpression($sql, $data);		
		$sth=$this->connection->prepare($sql);
		if(!$sth){
			$this->errorInfo=$this->connection->errorInfo();
			$this->errorInfo=$this->errorInfo[2];
			$this->errorCode=$this->connection->errorCode();
			return 0;
		}
		foreach ($data as $k=>$v){
			$sth->bindValue($k, $v,PHPVarType2PDOBindType::convert($v));
		}
		if($sth->execute()){
			return $sth->rowCount();
		}else{
			$this->errorInfo=$sth->errorInfo();
			$this->errorInfo=$this->errorInfo[2];
			$this->errorCode=$sth->errorCode();
			return 0;
		}
	}
	
	private function _parse_sqlExpression(&$sql,&$data){
		foreach ($data as $key=>$val){
			if($val instanceof sqlExpression){
				$exp=$this->_checkExp($val->exp);
				if($exp!=""){
					$sql=preg_replace("/".$key."([^\w]|$)/", $exp."$1", $sql);
					unset($data[$key]);
				}
			}
		}
	}
	private function _checkExp($exp){
		if(strtolower($exp)=="now()")return $exp;
		return ""; 
	}
}
