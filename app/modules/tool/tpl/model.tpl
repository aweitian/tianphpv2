<?php
/**
 * Date: {date}
 * Author: Awei.tian
 * Description: 
 */
class {name}Model extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}
	public function test(){
		return "hi";
	}
}