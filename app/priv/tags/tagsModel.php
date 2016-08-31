<?php
/**
 * Date: 2016-06-18
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/tags/tags.api.php";

class tagsModel extends privModel{
	private $api;
	public function __construct(){
		parent::__construct();
		$this->api = new tagsApi();
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