<?php
/**
 * 前台TPL文件调用 患者评价 模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
require FILE_SYSTEM_ENTRY."/app/data/_meta/appraiseLvMeta.php";
class appraiseUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_appraise.xml");
	}
	
	/**
	 * @return appraiseUIApi
	 */
	public static function getInstance(){
		if(is_null(appraiseUIApi::$inst)){
			appraiseUIApi::$inst = new appraiseUIApi();
		}
		return appraiseUIApi::$inst;
	}
	
	/**
	 * 获取 患者评价
	 * sid,uid,did,dod,txt,lv,date
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getData($length){
		$cache_key = "getData-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_appraise/data");
		$ret = $this->db->fetchAll($sql, array(
			"length" => $length		
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 根据DOD获取 患者评价
	 * sid,uid,did,dod,txt,lv,date
	 * @param int $dod
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getDataByDod($dod,$length){
		$cache_key = "getDataByDod-".$dod."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_appraise/rows_dod");
		$ret = $this->db->fetchAll($sql, array(
			"dod" => $dod,		
			"length" => $length		
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * 根据UID获取 患者评价
	 * sid,uid,did,dod,txt,lv,date
	 * @param int $uid
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getDataByUid($uid,$length){
		$cache_key = "getDataByUid-".$uid."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_appraise/rows_uid");
		$ret = $this->db->fetchAll($sql, array(
			"uid" => $uid,		
			"length" => $length		
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	 
	
	
}