<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class symptomUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_symptom.xml");
	}
	
	public static function getInstance(){
		if(is_null(symptomUIApi::$inst)){
			symptomUIApi::$inst = new symptomUIApi();
		}
		return symptomUIApi::$inst;
	}
	
	/**
	 * 随机获取二级症状,参数length最多获取多少个
	 * 返回字段:aid,kw,desc,thumb,title,date
	 * @param int $length
	 * @return array fetchAll
	 */
	public function all($length){
		$cache_key = "all-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_symptom/all_rand");
		$ret = $this->db->fetch($sql, array(
				"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
}