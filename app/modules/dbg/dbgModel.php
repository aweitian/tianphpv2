<?php
/**
 * Date: 2016-04-11
 * Author: Awei.tian
 * Description: 
 */
class dbgModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->initMySqlDb();
	}
	public function test(){
		$row = $this->db->fetch("select * from aaa", array());
		return $row;
	}
}