<?php
/**
 * 前台TPL文件调用栏目信息接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class treeUIApi {
	const TYPE_UNKNOW = 0;
	const TYPE_ARTICLE = 1;
	const TYPE_LIST = 2;
	const TYPE_CLASS = 3;
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
	public function existAid($aid, $channel) {
		$cache_key = "existAid-" . $aid . "-" . $channel;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_tree/getTrdByAid" );
		$ret = $this->db->fetch ( $sql, array (
				"aid" => $aid 
		) );
		// var_dump($ret,$this->sidCache[$ret["trd"]]);exit;
		if (empty ( $ret )) {
			$ret = false;
		} else {
			if ($this->sidCache [$ret ["trd"]] ["url"] == $channel) {
				$ret = true;
			} else {
				$ret = false;
			}
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	public function getData($channel) {
		return array_key_exists ( $channel, $this->keyCache ) ? $this->keyCache [$channel] : array ();
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
	public function getAidArrByTrd($trd, $length, $offset = 0) {
		$cache_key = "getAidArrByTrd-" . $trd . "-" . $length . "-" . $offset;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_tree/getAidArrByTrd" );
		$data = $this->db->fetchAll ( $sql, array (
				"trd" => $trd,
				"offset" => $offset,
				"length" => $length 
		) );
		$ret = array ();
		foreach ( $data as $item ) {
			$ret [] = $item ["aid"];
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	public function getAidArrByTrdCnt($trd) {
		$cache_key = "getAidArrByTrdCnt-" . $trd;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_tree/getAidArrByTrdCnt" );
		$data = $this->db->fetch ( $sql, array (
				"trd" => $trd 
		) );
		$ret = $data ["cnt"];
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	/**
	 *
	 * @param string $key        	
	 * @return int (treeUIApi TYPE)
	 */
	public function getType($url) {
		$url = trim ( $url, "/" );
		$cache_key = "getType-" . $url;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$ret = treeUIApi::TYPE_UNKNOW;
		foreach ( $this->keyCache as $key => $v ) {
			if ($url == $key) {
				$ret = treeUIApi::TYPE_LIST;
			}
			if (utility::startsWith ( $key, $url . "/" )) {
				$ret = treeUIApi::TYPE_CLASS;
				break;
			}
		}
		// var_dump($this->keyCache);exit;
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
		if (! validator::isUint ( $trd )) {
			// debug_print_backtrace ();
			// var_dump($trd);exit;
			return "";
		}
		if (array_key_exists ( $trd, $this->sidCache )) {
			return $this->sidCache [$trd] ["url"];
		}
		return "";
	}
	/**
	 *
	 * @param int $trd
	 *        	treeid
	 * @return string 类似 aaaa / bbbb / cccc 这样的路径
	 */
	// public function getPathName($trd) {
	// return array_key_exists ( $trd, $this->sidCache ) ? $this->_getPathName ( $this->sidCache [$trd] ) : "";
	// }
	// private function _getPathName($a, $sep = " / ") {
	// if (! is_array ( $a ))
	// return false;
	// if ($a ["pid"] == 0)
	// return $a ["url"];
	// else {
	// return call_user_func ( array (
	// $this,
	// "_getPathName"
	// ), $this->sidCache [$a ["pid"]] ) . $sep . $a ["url"];
	// }
	// }
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
	}
	private function initUrlCache() {
		foreach ( $this->sidCache as $item ) {
			$this->keyCache [$this->_initUrlCache ( $item )] = $item;
		}
		foreach ( $this->keyCache as $u => $item ) {
			// print $item["sid"]."\n";
			$this->sidCache [$item ["sid"]] ["url"] = $u;
		}
		// var_dump($this->sidCache);exit;
		// var_dump($this->keyCache);exit;
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