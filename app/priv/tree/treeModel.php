<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/tree/tree.api.php";
class treeModel extends privModel{
	private $api;
	public function __construct(){
		parent::__construct();
		$this->api = new treeApi();
	}
	public function rm($sid){
		return $this->api->rm($sid);
	}
	
	public function getChildren($pid){
		return $this->api->getChildren($pid);
	}

	public function edit($sid,$name, $url, $order){
		return $this->api->update($sid,$name, $url, $order);
	}
	public function add($pid,$name, $url, $order){
		return $this->api->add($pid,$name, $url, $order);
	}
	
	public function row($sid){
		return $this->api->row($sid);
	}
	
	public function path($sid){
		return $this->api->path($sid);
	}

}