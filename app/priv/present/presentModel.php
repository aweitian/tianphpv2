<?php
/**
 * Date: 2016-05-14
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/present/present.api.php";
class presentModel extends privModel{
	public function __construct(){
		parent::__construct();
	}
	
	
	//present no update
	
	public function presentGive($uid,$dod,$pid,$date){
		$api = new presentApi();
		return $api->presentGive($uid, $dod, $pid, $date);
	}
	
	public function presentRemove($sid){
		$api = new presentApi();
		return $api->presentRemove($sid);
	}
	
	
	
	
	public function all(){
		$api = new presentApi();
		return $api->all();
	}
	
	public function row($sid){
		$api = new presentApi();
		return $api->row($sid);
	}
	
	
	public function add($data,$cost,$benefit,$avatar){
		$api = new presentApi();
		return $api->add($data, $cost, $benefit, $avatar);
	}
	
	public function update($sid,$data,$cost,$benefit,$avatar){
		$api = new presentApi();
		return $api->update($sid, $data, $cost, $benefit, $avatar);
	}
	
	public function remove($sid){
		$api = new presentApi();
		return $api->remove($sid);
	}
}