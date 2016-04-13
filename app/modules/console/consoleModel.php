<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
class consoleModel extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}
	public function test(){
		return "hi";
	}
}