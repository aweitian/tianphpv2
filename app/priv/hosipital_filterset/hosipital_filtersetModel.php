<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/hosipital_filterset/hosipital_filterset.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/filter_sets/filterSet.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/hosipital/hosipital.api.php";
class hosipital_filtersetModel extends privModel{
	private $api;
	public function __construct(){
		parent::__construct();
		$this->api = new hosFilApi();
	}
	
	public function showDetail($hid){
		return $this->api->showDetail($hid);
	}
	
	public function getDepthData($mid){
		$api = new filterSetApi();
		return $api->getDepthData($mid);
	}
	
	public function getHosipitalRow($hid){
		$api = new hosipitalApi();
		return $api->row($hid);
	}
	
	public function exists($hid,$mid){
		$api = new hosFilApi();
		return $api->exists($hid, $mid);
	}
	public function add($fsid,$hid){
		return $this->api->add($hid, $fsid);
	}
	public function rm($hid,$mid){
		$this->api->remove($hid,$mid);
	}
	public function update($hid, $fsid, $oldfsid){
		return $this->api->update($hid, $fsid, $oldfsid);
	}
}