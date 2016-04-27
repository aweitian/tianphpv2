<?php
/**
 * Date: 2016-04-26
 * Author: Awei.tian
 * Description: 
 */

class queryModel extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}
	public function test(){
		return "hi";
	}
}