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
	private $cache = array();
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_article.xml");
	}
	
	public static function getInstance(){
		if(is_null(articleUIApi::$inst)){
			articleUIApi::$inst = new articleUIApi();
		}
		return articleUIApi::$inst;
	}
	
	/**
	 * 根据文章查找医生，返回一个医生的ID,数据出错的情况下返回0
	 * @param int $aid
	 * @return number
	 */
	public function getFirstDod($aid){
		$cache_key = "getFirstDod-".$aid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_article/first_author_byaid");
		$ret = $this->db->fetch($sql, array(
				"aid" => $aid
		));
		if (!empty($ret)){
			$ret = $ret["dod"];
		}else{
			$ret = 0;
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	
	
	
	
	/**
	 * 按病种ID获取文章,第一篇带THUMBNAIL(最多返回一个，有可能为0)
	 * aid,kw,desc,thumb,title,date
	 * @param int $did 病种ID
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getAllThumbnail($did,$length){
		$cache_key = "getAllThumbnail-".$did."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		
		$sql = $this->sqlManager->getSql("/ui_article/row_thumb_did");
		$thumbnail = $this->db->fetch($sql, array(
				"did" => $did
		));
		if(!empty($thumbnail)){
			$length--;
			$sql = $this->sqlManager->getSql("/ui_article/allByDid_Exc");
			$others = $this->db->fetchAll($sql, array(
					"did" => $did,
					"exc" => $thumbnail["aid"],
					"length" => $length
			));
			$ret = array_merge($thumbnail,$others);
			$this->cache[$cache_key] = $ret;
			return $ret;
		}else{
			$sql = $this->sqlManager->getSql("/ui_article/allByDid");
			$ret = $this->db->fetchAll($sql, array(
					"did" => $did,
					"length" => $length
			));
			$this->cache[$cache_key] = $ret;
			return $ret;
		}
	}
	
	/**
	 * 按病种ID获取第一篇带THUMBNAIL文章(最多返回一个，有可能为0)
	 * aid,kw,desc,thumb,title,date
	 * @param int $did 病种ID
	 * @return array fetch
	 */
	public function getRowThumbnailByDid($did){
		$cache_key = "getRowThumbnailByDid-".$did;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_article/row_thumb_did");
		$ret = $this->db->fetch($sql, array(
			"did" => $did
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 根据DID获取病种下所有文章
	 * aid,kw,desc,thumb,title,date
	 * @param int $did
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getAll($did,$length){
		$cache_key = "getAll-".$did."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_article/allByDid");
		$ret = $this->db->fetchAll($sql, array(
			"did" => $did,
			"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * 获取病种不包括传递的AID的所有文章
	 * aid,kw,desc,thumb,title,date
	 * @param int $did
	 * @param int $exc
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getAllExc($did,$exc,$length){
		$cache_key = "getAllExc-".$did."-".$exc."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_article/allByDid_Exc");
		$ret = $this->db->fetchAll($sql, array(
			"did" => $did,
			"exc" => $exc,
			"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
}