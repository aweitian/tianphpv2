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
		$cache_key = "getCountByAid-".$aid;
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
	 *
	 * @param int $uid
	 * @param int $dod
	 * @param string $content
	 * @return rirResult
	 */
	public function add($uid, $aid, $content) {
		$op_type = "user_submit";
		$op_id = $uid;
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $op_id );
		if (USER_SUBMIT_TRY_MAX - $try_cnt <= 0) {
			return new rirResult ( 1, "今天向网站提交的数据过多" );
		}
		$opsid = $oplog->add ( $op_type, $op_id );
		$oplog->update ( $opsid );
	
		if(utility::utf8Strlen($content) > 2048){
			return new rirResult ( 2, "内容过长" );
		}
		$sql = $this->sqlManager->getSql("/ui_comment/add");
		$bnd = array(
				"uid" => $uid,
				"aid" => $aid,
				"comment" => $content,
		);
		// var_dump($sql,$bnd);exit;
		$row = $this->db->insert ( $sql, $bnd );
		if ($row > 0) {
			return new rirResult ( 0, "提交成功，审核通过后会出现在页面上" );
		}
		return new rirResult ( 0, $this->db->getErrorInfo() );
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