<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/filter_sets/filterSet.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/filter_meta/filter_meta.api.php";

class filtersetModel extends privModel{
	private $api;
	public function __construct(){
		parent::__construct();
		$this->api = new filterSetApi();
	}
	public function rm($sid){
		return $this->api->rm($sid);
	}
	
	public function getMetaData($mid){
		$api = new filterMetaApi();
		return $api->row($mid);
	}
	public function getDepth($sid){
		return $this->api->getDepth($sid);
	}
	
	public function getChildren($pid,$mid){
		return $this->api->getChildren($pid,$mid);
	}

	public function edit($sid,$name, $url, $order){
		return $this->api->update($sid,$name, $url, $order);
	}
	public function add($pid,$mid,$name, $url, $order){
		return $this->api->add($pid,$mid,$name, $url, $order);
	}
	
	public function row($sid){
		return $this->api->row($sid);
	}
	
	public function path($sid,$mid){
		return $this->api->path($sid,$mid);
	}
}