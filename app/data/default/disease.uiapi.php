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
	private $cache = array();
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_disease.xml");
	}
	public static function getInstance(){
		if(is_null(diseaseUIApi::$inst)){
			diseaseUIApi::$inst = new diseaseUIApi();
		}
		return diseaseUIApi::$inst;
	}
	
	
	/**
	 * 获取疾病名称
	 * @param int $did
	 * @return string;
	 */
	public function getNameByDid($did){
		$cache_key = "getNameByDid-".$did;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
	
		$ret = $this->getRowByDid($did);
		if(empty($ret)){
			$ret = "";
		}else{
			$ret = $ret["data"];
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * 
	 * 返回类似下面的二维数组
	 * 
	 * pid  	pd		mid  	md       	url    
	 * ------  	------	------  --------	-------- 
	 * 322  	男性不育	327  	男性不育症		nxbyz
	 * 322  	男性不育	326  	肾虚           		sx 
	 * @return array(fetchAll);
	 */
	public function getInfo() {
		$cache_key = "getInfo";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_disease/tree2table");
		$ret = $this->db->fetchAll($sql, array());
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * sid  key     data         pid     grp  	metaid  
	 * 327  nxbyz   男性不育症                  322       1 	2
	 * @param string $urlkey
	 * @return array(fetch);
	 */
	public function getRowByDiskey($urlkey) {
		$cache_key = "getRowByDiskey-".$urlkey;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_disease/row_disease_url");
		$ret = $this->db->fetch($sql, array(
			"key" => $urlkey
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 
	 * @return array fetchAll;
	 */
	public function getLv0Infoes(){
		$cache_key = "getLv0Infoes";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_disease/lv0Infoes");
		$ret = $this->db->fetch($sql, array());
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * 返回字段:key,data,pid 
	 * @param int $did
	 * @return array(fetch);
	 */
	public function getRowByDid($did){
		$cache_key = "getRowByDid-".$did;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_disease/rowBySid");
		$ret = $this->db->fetch($sql, array(
			"did" => $did
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * sid  thumb                              title   desc    
	 * 30  /uploads/user/201606211043371.png  tald    sdalfkwe  
	 * 根据病种ID获取疾病知识的文章
	 * @param int $did
	 * @return array fetch
	 */
	public function getArticleTag7ByDid($did){
		$cache_key = "getArticleTag7ByDid-".$did;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_disease/ArticleTag7/main");
		$ret = $this->db->fetch($sql, array(
			"did" => $did
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
}