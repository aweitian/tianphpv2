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

	
	/**
	 * @return presentUIApi
	 */
	public static function getInstance(){
		if(is_null(presentUIApi::$inst)){
			presentUIApi::$inst = new presentUIApi();
		}
		return presentUIApi::$inst;
	}
	
	/**
	 * 返回字段:sid    cost  data             ben  avatar  
	 * 获取礼物列表信息
	 * @return array
	 */
	public function all() {
		$cache_key = "all";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/all"),
				array(
				));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 返回字段:sid    cost  data             ben  avatar      
	 * 获取礼物列表信息
	 * @return array
	 */
	public function row($pid) {
		$cache_key = "row-".$pid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetch(
				$this->sqlManager->getSql("/ui_present/row"),
				array(
						"sid" => $pid
				));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	

	/**
	 * 获取所有的赠送礼物数据
	 * 返回字段:sid     uid     dod     pid  date
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getData($length,$offset=0){
		$cache_key = "getData-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/data"), 
				array(
					"length" => $length,
					"offset" => $offset,
				));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 获取所有的赠送礼物数据个数
	 * @return int
	 */
	public function getDataCnt(){
		$cache_key = "getDataCnt";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetch(
				$this->sqlManager->getSql("/ui_present/data_cnt"), 
				array(
				));
		$this->cache[$cache_key] = $ret["cnt"];
		return $ret["cnt"];
	}
	
	/**
	 * 获取最新 用户赠送给某个医生的所有礼物数据
	 * 返回字段： sid     uid     dod     pid  date
	 * @param int $dod
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getDataByDod($dod,$length,$offset=0){
		$cache_key = "getDataByDod-".$dod."-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/data_dod"), 
				array(
					"dod" => $dod,
					"length" => $length,
					"offset" => $offset,
				));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取所有的赠送礼物数据个数
	 * @return int
	 */
	public function getDataByDodCnt($dod){
		$cache_key = "getDataByDodCnt";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
	
		$ret = $this->db->fetch(
				$this->sqlManager->getSql("/ui_present/data_dod_cnt"),
				array(
						"dod" => $dod
				));
		$this->cache[$cache_key] = $ret["cnt"];
		return $ret["cnt"];
	}
	
	
	
	/**
	 * 获取最新某个用户所有赠送的礼物数据
	 * @param int $uid
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getDataByUid($uid,$length,$offset=0){
		$cache_key = "getDataByUid-".$uid."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_present/data_uid"), 
				array(
					"uid" => $uid,
					"offset" => $offset,
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
	public function getDataByUidCnt($uid){
		$cache_key = "getDataByUidCnt-".$uid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->db->fetch(
				$this->sqlManager->getSql("/ui_present/data_uid_cnt"), 
				array(
					"uid" => $uid,
				));
		$ret = $ret["cnt"];
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