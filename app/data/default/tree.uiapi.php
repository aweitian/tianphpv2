<?php
/**
 * 前台TPL文件调用栏目信息接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class treeUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array ();
	
	// KEY为SID
	private $sidCache = array ();
	// KEY为CTR的第一个路径
	private $ctrCache = array ();
	
	// KEY为全路径/aa/bb/cc
	private $keyCache = array ();
	private function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/default/ui_tree.xml" );
		$this->initCache ();
	}
	
	/**
	 *
	 * @return treeUIApi
	 */
	public static function getInstance() {
		if (is_null ( treeUIApi::$inst )) {
			treeUIApi::$inst = new treeUIApi ();
		}
		return treeUIApi::$inst;
	}
	
	/**
	 *
	 * @param string $key        	
	 * @return boolean
	 */
	public function existAid($aid) {
		$cache_key = "getTrd-" . $aid;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_tree/getTrdByAid" );
		$ret = $this->db->fetch ( $sql, array (
				"aid" => $aid 
		) );
		if (empty ( $ret )) {
			$ret = false;
		} else {
			$ret = true;
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 *
	 * @param string $key        	
	 * @return boolean
	 */
	public function getTrd($aid) {
		$cache_key = "getTrd-" . $aid;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_tree/getTrdByAid" );
		$ret = $this->db->fetch ( $sql, array (
				"aid" => $aid 
		) );
		if (empty ( $ret )) {
			$ret = 0;
		} else {
			$ret = $ret ["trd"];
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	/**
	 *
	 * @param string $key        	
	 * @return array()
	 */
	public function getAidArrByTrd($trd) {
		$cache_key = "getAidArrByTrd-" . $trd;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_tree/getAidArrByTrd" );
		$data = $this->db->fetchAll ( $sql, array (
				"trd" => $trd 
		) );
		$ret = array ();
		foreach ( $data as $item ) {
			$ret [] = $item ["aid"];
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	public function getChannelByAid($aid) {
		$trd = $this->getTrd ( $aid );
		if ($trd == 0)
			return "";
		else
			return $this->getChannelByTrd ( $trd );
	}
	public function getChannelByTrd($trd) {
		if (array_key_exists ( $trd, $this->sidCache )) {
			return $this->sidCache [$trd] ["url"];
		}
		return "";
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
	 * sid pid name url grp order layout
	 */
	private function initCache() {
		$sql = $this->sqlManager->getSql ( "/ui_tree/all" );
		$ret = $this->db->fetchAll ( $sql, array () );
		foreach ( $ret as $item ) {
			$this->sidCache [$item ["sid"]] = $item;
			if ($item ["pid"] == 0)
				$this->ctrCache [$item ["url"]] = $item;
		}
		$this->initUrlCache ();
		foreach ( $ret as $item ) {
			$this->keyCache [$item ["url"]] = $item;
		}
	}
	private function initUrlCache() {
		foreach ( $this->sidCache as & $item ) {
			$item ["url"] = $this->_initUrlCache ( $item );
		}
		// var_dump($this->sidCache);exit;
	}
	private function _initUrlCache($a) {
		if (! is_array ( $a ))
			return false;
		if ($a ["pid"] == 0)
			return $a ["url"];
		else {
			return call_user_func ( array (
					$this,
					"_initUrlCache" 
			), $this->sidCache [$a ["pid"]] ) . "/" . $a ["url"];
		}
	}
	public function debug() {
		// var_dump($this->keyCache);
	}
}