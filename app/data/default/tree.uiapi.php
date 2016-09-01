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
	private $sidCache = array ();
	private $ctrCache = array ();
	
	
	//只存储PID为0的元素
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
	public function exists($key) {
		return array_key_exists ( $key, $this->keyCache );
	}
	/*
	 * array(1) {
	 * [0]=>
	 * array(6) {
	 * ["sid"]=>
	 * string(1) "2"
	 * ["pid"]=>
	 * string(1) "0"
	 * ["name"]=>
	 * string(12) "医院动态"
	 * ["url"]=>
	 * string(4) "yydt"
	 * ["order"]=>
	 * string(1) "0"
	 * ["layout"]=>
	 * string(0) ""
	 * }
	 * }
	 */
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
	}
}