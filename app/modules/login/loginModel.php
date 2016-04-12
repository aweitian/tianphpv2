<?php
/**
 * Date: 2016-04-12
 * Author: Awei.tian
 * Description: 
 */
class loginModel extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}
	public function test(){
		return "hi";
	}
}