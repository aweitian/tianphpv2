<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class commentUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private $waterArmCache = array();
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_comment.xml");
		
	}
	/**
	 * @return commentUIApi
	 */
	public static function getInstance(){
		if(is_null(commentUIApi::$inst)){
			commentUIApi::$inst = new commentUIApi();
		}
		return commentUIApi::$inst;
	}
	
	
	/**
	 * 获取文章的评论数
	 * @param int $aid
	 * @return int;
	 */
	public function getCountByAid($aid){
		$cache_key = "getCountByAid-".$uid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_comment/count");
		$data = $this->db->fetch($sql, array("aid"=>$aid));
		if(empty($data)){
			$ret = 0;
		}else{
			$ret = $data["cnt"];
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * 返回字段:aid,comment,datetime,uid
	 * @param int $aid
	 * @param int $offset
	 * @param int $length
	 * @return array;
	 */
	public function data($aid,$offset,$length){
		$cache_key = "data-".$aid."-".$offset."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_comment/data");
		$ret = $this->db->fetchAll($sql, array(
				"aid"=>$aid,
				"offset"=>$offset,
				"length"=>$length
				
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}

}