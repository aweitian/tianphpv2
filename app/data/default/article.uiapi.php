<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class articleUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array ();
	private $aidCache = array ();
	private function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/default/ui_article.xml" );
	}
	
	/**
	 *
	 * @return articleUIApi
	 */
	public static function getInstance() {
		if (is_null ( articleUIApi::$inst )) {
			articleUIApi::$inst = new articleUIApi ();
		}
		return articleUIApi::$inst;
	}
	/**
	 * aid,kw,desc,thumb,title,date
	 *
	 * @param int $aid        	
	 * @return array fetch
	 */
	public function rowNoContent($aid) {
		$cache_key = "rowNoContent-" . $aid;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		if (array_key_exists ( $aid, $this->aidCache )) {
			$ret = $this->aidCache [$aid];
		} else {
			$ret = $this->db->fetch ( $this->sqlManager->getSql ( "/ui_article/row_nocontent" ), array (
					"aid" => $aid 
			) );
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * aid,kw,desc,thumb,title,content,date
	 *
	 * @param int $aid        	
	 * @param int $textlength,如果不想截取，传递0        	
	 * @return array fetch
	 */
	public function row($aid, $textlength) {
		$cache_key = "row-" . $aid . "-" . $textlength;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		if (array_key_exists ( $aid, $this->aidCache )) {
			$ret = $this->aidCache [$aid];
		} else {
			$ret = $this->db->fetch ( $this->sqlManager->getSql ( "/ui_article/row" ), array (
					"aid" => $aid 
			) );
			if ($textlength > 0 && ! empty ( $ret )) {
				$ret ["content"] = utility::utf8Substr ( strip_tags ( $ret ["content"] ), 0, $textlength );
			}
		}
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 按病种ID获取第一篇带THUMBNAIL文章(最多返回一个，有可能为0)
	 * aid,kw,desc,thumb,title,date
	 *
	 * @param int $did
	 *        	病种ID
	 * @return array fetch
	 */
	public function getRowThumbnail() {
		$cache_key = "getRowThumbnail";
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		
		$sql = $this->sqlManager->getSql ( "/ui_article/row_thumb" );
		$ret = $this->db->fetch ( $sql, array () );
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 根据文章查找医生，返回一个医生的ID,数据出错的情况下返回0
	 * 别名(getFirstDod)
	 * @param int $aid (文章ID)
	 * @return int
	 */
	public function getOwner($aid){
		return $this->getFirstDod($aid);
	}
	
	

	/**
	 * 获取所有文章的个数
	 *
	 * @param int $did        	
	 * @return int
	 */
	public function getAllCnt() {
		$cache_key = "getAllCnt";
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		
		$sql = $this->sqlManager->getSql ( "/ui_article/allCnt" );
		$ret = $this->db->fetch ( $sql, array () );
		$ret = $ret ["cnt"];
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取最新的N个文章
	 * aid,kw,desc,thumb,title,date
	 *
	 * @param int $length        	
	 * @return array fetchAll;
	 */
	public function all($length, $offset = 0) {
		$cache_key = "getNewest-" . $length;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql ( "/ui_article/all" );
		$ret = $this->db->fetchAll ( $sql, array (
				"offset" => $offset,
				"length" => $length 
		) );
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
}