<?php
/**
 * @author awei.tian
 * date: 2013-8-10
 * 说明:MYSQL PDO 最基本的操作
 */
define("MAX_RESULT_RETURN",500);
require_once 'lib/tianv2/interfaces/db/IPdoBase.php';
require_once 'PHPVarType2PDOBindType.php';
require_once "sqlExpression.php";
class mysqlPdoBase implements IPdoBase{
	const ERROR_EXCEED_LIMIT_COUNT = 0x1e7d;
	private $connection;
	private $errorInfo;//string
	private $errorCode;//code
	const NONERRCODE = "00000";
	public function __construct(){
		$this->connection = tian::$pdo;
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
	/**
	 * 
	 * @return last insert into id
	 * @param string $sql
	 * @param array $data
	 */
	public function insert($sql,$data){
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
		$sth->execute();
		$id=$this->connection->lastInsertId();
		if($id==0){
			$this->errorInfo=$sth->errorInfo();
			$this->errorInfo=$this->errorInfo[2];
			$this->errorCode=$sth->errorCode();
		}
		return $id;
	}
	/**
	 * 
	 * @return array;
	 * @param string $sql
	 * @param array $data
	 */
	public function fetch($sql,$data,$fetch_mode=PDO::FETCH_ASSOC){
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
		$sth->execute();
		$this->errorInfo=$sth->errorInfo();
		$this->errorInfo=$this->errorInfo[2];
		$this->errorCode=$sth->errorCode();
		$ret=$sth->fetch();
		if(!is_array($ret))return array();
		return $ret;
	}
	
	/**
	 * 
	 * @return array;
	 * @param string $sql
	 * @param array $data
	 */
	public function fetchAll($sql,$data,$fetch_mode=PDO::FETCH_ASSOC){
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
		$sth->execute();
		$this->errorInfo=$sth->errorInfo();
		$this->errorInfo=$this->errorInfo[2];
		$this->errorCode=$sth->errorCode();
		$r=$sth->fetchAll();
		if(count($r)>MAX_RESULT_RETURN){
			$this->errorInfo='Return data exceed the limit '.MAX_RESULT_RETURN
				.',revise the number @ LIB_PATH/db/mysql/mysqlPdoBase.php'
			;
			$this->errorCode=self::ERROR_EXCEED_LIMIT_COUNT;
			return array();
		}
		else return $r;
	}
	/**
	 * 
	 * @return affected rows
	 * @param string $sql
	 * @param array $data
	 */
	public function exec($sql,$data){
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
		$sth->execute();
		$this->errorInfo=$sth->errorInfo();
		$this->errorInfo=$this->errorInfo[2];
		$this->errorCode=$sth->errorCode();
		return $sth->rowCount();
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
