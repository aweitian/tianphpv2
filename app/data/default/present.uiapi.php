<?php
/**
 * 前台TPL文件调用礼物模块接口类
 * @author awei.tian
 * @date   2016-6-25
 */
class presentUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	private $meta_cache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_present.xml");
		$this->initMetaCache();
	}

	public static function getInstance(){
		if(is_null(presentUIApi::$inst)){
			presentUIApi::$inst = new presentUIApi();
		}
		return presentUIApi::$inst;
	}
	
	/**
	 * 获取礼物信息:sid,cost,data,ben,avatar
	 * @param int $pid
	 * @return string;
	 */
	public function getInfoByPid($pid){
		$cache_key = "getNameByPid-".$pid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		if(array_key_exists($pid, $this->meta_cache)){
			$ret = $this->meta_cache[$pid];
		}else{
			$ret = array();
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取最新的赠送礼物数据
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getData($length){
		$cache_key = "getData-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/data"), 
				array(
					"length" => $length
				));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取最新 用户赠送给某个医生的所有礼物数据
	 * @param int $dod
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getDataByDod($dod,$length){
		$cache_key = "getDataByDod-".$dod."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/rows_dod"), 
				array(
					"dod" => $dod,
					"length" => $length
				));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取最新某个用户所有赠送的礼物数据
	 * @param int $uid
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getDataByUid($uid,$length){
		$cache_key = "getDataByUid-".$uid."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/rows_uid"), 
				array(
					"uid" => $uid,
					"length" => $length
				));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	private function initMetaCache(){
		$data = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/meta"), array());
		foreach($data as $item){
			$this->meta_cache[$item["sid"]] = $item;
		}
	}
	
}