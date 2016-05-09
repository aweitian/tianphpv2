<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class loginModel extends privModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}
	public function test(){
		return "hi";
	}
}