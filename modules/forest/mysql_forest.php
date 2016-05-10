<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 */
require_once dirname(__FILE__)."/mysql_tree.php";
class mysql_forest implements IteratorAggregate {
	private $data = array();
	
	/**
	 * 
	 * @var mysqlPdoBase $db
	 */
	private $db;
	
	/**
	 * 
	 * @param string $tb_name  表名
	 * @param string $fpid		PID表字段名
	 * @param string $root		根结点PID特征
	 */
	public function __construct($tb_name,$pk="sid",$fpid="pid",$root="0"){
		
	}
	
	
	
	public function add($key,mysql_tree $tree){
		$this->data[$key] = $tree;
		return $this;
	}
	/**
	 * 根据KEY从森林中删除树，树本身存在
	 * @param unknown $key
	 */
	public function rm($key){
		if(isset($this->data[$key])){
			unset($this->data[$key]);
			return true;
		}
		return false;
	}
	
	public function append(mysql_tree $tree){
		$this->data[] = $tree;
		return $this;
	}
	
	public function getIterator() {
		return new ArrayIterator($this->data);
	}
	
	public function destroy(){
		foreach($this as $key => $value) {
			var_dump($key, $value);
			echo PHP_EOL;
		}
	}
}