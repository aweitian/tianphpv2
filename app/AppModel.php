<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 */
class AppModel extends Model{
	public function __construct() {
	}
	protected function initDb(){
		$this->initMySqlDb();
	}
}