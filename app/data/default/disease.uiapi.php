<?php
/**
 * 前台TPL文件调用疾病信息接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class diseaseUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array ();
	private $sidCache = array ();
	private $keyCache = array ();
	private function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/default/ui_disease.xml" );
		$this->initCache ();
	}
	/**
	 *
	 * @return diseaseUIApi
	 */
	public static function getInstance() {
		if (is_null ( diseaseUIApi::$inst )) {
			diseaseUIApi::$inst = new diseaseUIApi ();
		}
		return diseaseUIApi::$inst;
	}
	
	/**
	 * 获取疾病名称
	 *
	 * @param int $did        	
	 * @return string;
	 */
	public function getNameByDid($did) {
		$cache_key = "getNameByDid-" . $did;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		
		$ret = $this->getRowByDid ( $did );
		if (empty ( $ret )) {
			$ret = "";
		} else {
			$ret = $ret ["data"];
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 根据二级病种ID获取一级病种ID
	 * 不存在返回0
	 *
	 * @param int $lv1id
	 *        	return int
	 */
	public function getParent($lv1id) {
		if (array_key_exists ( $lv1id, $this->sidCache )) {
			return $this->sidCache [$lv1id] ["pid"];
		}
		return 0;
	}
	
	/**
	 * 获取同级的数据
	 * 返回字段:sid key data
	 *
	 * @param $did 二级的病种ID        	
	 * @return array
	 */
	public function getSiblingDids($did) {
		$cache_key = "getSiblingDids-" . $did;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$ret = array ();
		$pid = $this->getParent ( $did );
		if ($pid == 0) {
			$this->cache [$cache_key] = $ret;
			return array ();
		}
		
		$ret = $this->getLv1InfoesByDid ( $pid );
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 *
	 * @param string $key        	
	 * @return boolean
	 */
	public function exists($key) {
		return array_key_exists ( $key, $this->keyCache );
	}
	/**
	 *
	 * 返回类似下面的二维数组
	 *
	 * pid pd mid md url
	 * ------ ------ ------ -------- --------
	 * 322 男性不育 327 男性不育症 nxbyz
	 * 322 男性不育 326 肾虚 sx
	 *
	 * @return array(fetchAll);
	 */
	public function getInfo() {
		$cache_key = "getInfo";
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_disease/tree2table" );
		$ret = $this->db->fetchAll ( $sql, array () );
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 返回一维数组，里面是`syd`
	 *
	 * @param int $did        	
	 * @return array
	 */
	public function getSydsBydid($did) {
		$cache_key = "getSydsBydid-" . $did;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_disease/symptoms_did" );
		$data = $this->db->fetchAll ( $sql, array (
				"did" => $did 
		) );
		$ret = array ();
		foreach ( $data as $item ) {
			$ret [] = $item ["syd"];
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * sid key data pid metaid
	 * 327 nxbyz 男性不育症 322 2
	 *
	 * @param string $urlkey        	
	 * @return array(fetch);
	 */
	public function getRowByDiskey($urlkey) {
		$cache_key = "getRowByDiskey-" . $urlkey;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$ret = array_key_exists ( $urlkey, $this->keyCache ) ? $this->keyCache [$urlkey] : array ();
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 返回字段:sid,key,data
	 *
	 * @return array fetchAll;
	 */
	public function getLv0Infoes() {
		$cache_key = "getLv0Infoes";
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		
		$ret = array ();
		foreach ( $this->sidCache as $item ) {
			if ($item ["pid"] == 0) {
				$ret [] = array (
						"sid" => $item ["sid"],
						"key" => $item ["key"],
						"data" => $item ["data"] 
				);
			}
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 返回字段:sid,key,data
	 *
	 * @return array fetchAll;
	 */
	public function getLv0KeyInfoes() {
		$cache_key = "getLv0KeyInfoes";
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		
		$ret = array ();
		foreach ( $this->sidCache as $item ) {
			if ($item ["pid"] == 0 && $item ["key"]) {
				$ret [$item ["key"]] = array (
						"sid" => $item ["sid"],
						"key" => $item ["key"],
						"data" => $item ["data"] 
				);
			}
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 根据大病种获取小病种信息
	 * 返回字段sid key data
	 *
	 * @param int $did        	
	 * @return array fet
	 */
	public function getLv1InfoesByDid($did) {
		$cache_key = "getLv1InfoesByDid-" . $did;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		// $this->sidCache
		$ret = array ();
		foreach ( $this->sidCache as $item ) {
			if ($item ["pid"] == $did) {
				$ret [] = array (
						"sid" => $item ["sid"],
						"key" => $item ["key"],
						"data" => $item ["data"] 
				);
			}
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 返回字段:sid,key,data,pid,metaid
	 *
	 * @param int $did        	
	 * @return array(fetch);
	 */
	public function getRowByDid($did) {
		$cache_key = "getRowByDid-" . $did;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		
		$ret = array_key_exists ( $did,  $this->sidCache) ? $this->sidCache [$did] : array ();
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * sid key data pid grp metaid
	 */
	private function initCache() {
		$sql = $this->sqlManager->getSql ( "/ui_disease/all" );
		$ret = $this->db->fetchAll ( $sql, array () );
		foreach ( $ret as $item ) {
			$this->sidCache [$item ["sid"]] = $item;
			if ($item ["key"]) {
				$this->keyCache [$item ["key"]] = $item;
			}
		}
	}
}