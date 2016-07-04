<?php
/**
 * 前台TPL文件调用症状模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class symptomUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	private $sidCache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_symptom.xml");
		$this->initCache();
	}
	
	public static function getInstance(){
		if(is_null(symptomUIApi::$inst)){
			symptomUIApi::$inst = new symptomUIApi();
		}
		return symptomUIApi::$inst;
	}
	
	/**
	 * 获取一级症状
	 * 返回字段:syd,data
	 * @return array fetchAll
	 */
	public function alllv0(){
		$cache_key = "alllv0";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = $this->alllv1BySyd(0);
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取某个一级症状ID下的二级症状
	 * 返回字段:syd,data
	 * @param $syd 一级症状ID
	 * @return array fetchAll
	 */
	public function alllv1BySyd($syd){
		$cache_key = "alllv1BySyd-".$syd;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$ret = array();
		foreach ($this->sidCache as $item){
			if($item["pid"] == $syd){
				$ret[] = array(
					"syd" =>  $item["sid"],
					"data" =>  $item["data"],
				);
			}
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取症状名称
	 * @param int $syd
	 * @return string;
	 */
	public function getNameBySyd($syd){
		$cache_key = "getNameBySyd-".$syd;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
	
		$ret = $this->getRowBySyd($syd);
		if(empty($ret)){
			$ret = "";
		}else{
			$ret = $ret["data"];
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 返回字段:sid,key,data,pid,metaid
	 * @param int $did
	 * @return array(fetch);
	 */
	public function getRowBySyd($syd){
		$cache_key = "getRowBySyd-".$syd;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$ret = array_key_exists($syd, $this->sidCache) ? $this->sidCache[$syd] : array();
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取症状诱发的疾病ID
	 * 返回数组:每个元素是did
	 * @param int $syd
	 * @return array fetchAll
	 */
	public function getDidsBySyd($syd){
		$cache_key = "getDiseaseBySyd-".$syd;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_symptom/all_symptom_disease");
		$data = $this->db->fetchAll($sql, array(
			"syd" => $syd
		));
		$ret = array();
		foreach ($data as $item){
			$ret[] = $item["did"];
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * sid  key     data                   pid     grp  metaid
	 */
	public function initCache(){
		$sql = $this->sqlManager->getSql("/ui_symptom/all");
		$ret = $this->db->fetchAll($sql, array());
		foreach ($ret as $item){
			$this->sidCache[$item["sid"]] = $item;
		}
	}	
}