<?php
/**
 * Date: 2016-04-12
 * Author: Awei.tian
 * Description: 
 */
class testModel extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}
	public function test(){
		$this->db->insert("INSERT INTO `abc` (
	`a`
) VALUES (
	:a
)", array(
	"a" => "aaa",

));
	}
}