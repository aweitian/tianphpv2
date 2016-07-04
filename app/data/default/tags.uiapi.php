<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class tagsUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	private $dataCache = array();
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_tags.xml");
		$this->init();
	}
	public static function getInstance(){
		if(is_null(tagsUIApi::$inst)){
			tagsUIApi::$inst = new tagsUIApi();
		}
		return tagsUIApi::$inst;
	}
	
	/**
	 * 根据标签获取ID
	 * @param string $text
	 * @return int 0表示没有找到
	 */
	public function getTagId($text){
		$cache_key = "getTagId-".$text;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		if(array_key_exists($text,$this->dataCache)){
			$ret = $this->dataCache[$text]["sid"];
		}else{
			$ret = 0;
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
		
	}
	
	
	private function init(){
		$data = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_tags/all"), array());
		foreach($data as $item){
			$this->dataCache[$item["text"]] = $item;
		}
	}

}