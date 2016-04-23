<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 */
class AppModel extends Model{
	/**
	 * 
	 * @var sqlManager $sqlManager
	 */
	protected $sqlManager;
	
	public function __construct() {

	}
	
	protected function initSqlManager($name){
		$this->sqlManager = new sqlManager($name);
	}
	protected function initDb(){
		$this->initMySqlDb();
	}
}