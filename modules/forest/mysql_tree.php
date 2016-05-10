<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 * 		对TREE FOREACH是对它的数据遍历
 */
require_once dirname(__FILE__)."/mysql_forest.php";
abstract class mysql_tree implements IteratorAggregate,ArrayAccess{
	protected $data = array();
	/**
	 * 
	 * @var mysql_forest
	 */
	protected $children;
	
	
	
	
	
	
	//实现接口
	
	
	/**
	 * @return mysql_forest
	 */
	public function getChildren(){
		return $this->children;
	}
	public function getIterator() {
		return new ArrayIterator($this->data);
	}
	public function offsetSet($offset, $value) {
		$this->data[$offset] = $value ;
	}
	public function offsetExists($var) {
		return array_key_exists($var, $this->data);
	}
	public function offsetUnset($var) {
		unset($this->data[$var]);
	}
	public function offsetGet($var) {
		return $this->data[$var];
	}
}