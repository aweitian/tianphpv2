<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/filter_meta/filter_meta.api.php";
class filterModel extends privModel{
	public function __construct(){
		parent::__construct();
	}
	
	
	public function all(){
		$api = new filterMetaApi();
		return $api->devAll();
	}
	/**
	 *
	 * @param string $type        	
	 * @param string $data (json)        	
	 * @param int $order        	
	 * @return rirResult
	 */
	public function add($type, $data, $order) {
		$api = new filterMetaApi();
		return $api->add($type, $data, $order);
	
	}
	
	/**
	 * 检查字段是否可以添加
	 * @param string $field
	 * @return bool
	 */
	public function chkRange($field){
		$api = new filterMetaApi();
		return $api->chkRange($field);
	}
	
	/**
	 * 检查是否可以添加模糊搜索
	 * @return bool
	 */
	public function chkLikestr(){
		$api = new filterMetaApi();
		return $api->chkLikestr();
	}
	
	
	
	
	/**
	 * 返回1OK,0 FAILED
	 * @param int $pid
	 * @return int;
	 */
	public function toggleEnabled(){
		$api = new filterMetaApi();
		return $api->toggleEnabled();
	}
	
	/**
	 * 返回1OK,0 FAILED
	 * @param int $pid
	 * @return int;
	 */
	public function update($sid, $data, $order){
		$api = new filterMetaApi();
		return $api->update($sid, $data, $order);
	}
	
	
	
	/**
	 * 删除
	 * @param int $sid
	 * @return rirResult
	 */
	public function rm($sid) {
		$api = new filterMetaApi();
		return $api->rm($sid);
	}
	
	
	
	/**
	 * 返回一行记录
	 * 返回字段:sid,type,data,order
	 * @return rirResult;
	 */
	public function row($sid) {
		$api = new filterMetaApi();
		return $api->row($sid);
	}

	
}