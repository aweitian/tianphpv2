<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/hosipital/hosipital.api.php";
class hosipitalModel extends privModel{
	private $api;
	public function __construct(){
		parent::__construct();
		$this->api = new hosipitalApi();
	}
	/**
	 * 只返回SID,tags
	 * @return rirResult;
	 */
	public function getAll(){
		return $this->api->getAll();
	}
	
	public function row($sid){
		return $this->api->row($sid);
	}
	
	public function remove($sid){
		return $this->api->rm($sid);
	}
	
	public function add($text){
		return $this->api->add($text);
	}
	
	public function update($sid,$text){
		return $this->api->update($sid, $text);
	}
}