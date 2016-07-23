<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/IOp.php";
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/oplog.php";
require_once FILE_SYSTEM_ENTRY . "/modules/captcha/captcha.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/_meta/avatarMeta.php";
class letterUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_letter.xml");
	}
	
	/**
	 * @return letterUIApi
	 */
	public static function getInstance(){
		if(is_null(letterUIApi::$inst)){
			letterUIApi::$inst = new letterUIApi();
		}
		return letterUIApi::$inst;
	}
	
	
	
	/**
	 *
	 * @param int $uid
	 * @param int $dod
	 * @param string $content
	 * @return rirResult
	 */
	public function add($uid, $dod, $content) {
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
		$sql = $this->sqlManager->getSql("/ui_letter/add");
		$bnd = array(
			"uid" => $uid,	
			"dod" => $dod,	
			"content" => $content,	
		);
		// var_dump($sql,$bnd);exit;
		$row = $this->db->insert ( $sql, $bnd );
		if ($row > 0) {
			return new rirResult ( 0, "提交成功，审核通过后会出现在页面上" );
		}
		return new rirResult ( 0, $this->db->getErrorInfo() );
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * 
	 * @param int $led
	 * @param int $uid
	 * 删除感谢信
	 * @return int 1/0
	 */
	public function rm($uid,$led){
		$sql = $this->sqlManager->getSql("/ui_letter/rm");
		$bnd = array(
			"uid" => $uid,
			"led" => $led
		);
		return $this->db->exec($sql, $bnd);
	}
	
	/**
	 * cnt
	 * @return int;
	 */
	public function cnt(){
		$cache_key = "cnt";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_letter/cnt");
		$ret = $this->db->fetch($sql, array());
		$ret = $ret["cnt"];
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * sid,uid,dod,did,content,date
	 * @param int $length
	 * @param int $offset
	 * @return array(fetchAll);
	 */
	public function data($length,$offset=0){
		$cache_key = "data-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_letter/data");
		$ret = $this->db->fetchAll($sql, array(
			"offset" => $offset,
			"length" => $length,
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * sid,uid,dod,did,content,date
	 * @param int $length
	 * @param int $offset
	 * @return array(fetchAll);
	 */
	public function getDataByDod($dod,$length,$offset=0){
		$cache_key = "getDataByDod-".$dod."-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_letter/rows_dod");
		$ret = $this->db->fetchAll($sql, array(
			"dod" => $dod,
			"offset" => $offset,
			"length" => $length,
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * sid,uid,dod,did,content,date
	 * @param int $length
	 * @param int $offset
	 * @return array(fetchAll);
	 */
	public function getDataByUid($uid,$length,$offset=0){
		$cache_key = "getDataByUid-".$uid."-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_letter/rows_uid");
		$ret = $this->db->fetchAll($sql, array(
			"uid" => $uid,
			"offset" => $offset,
			"length" => $length,
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
}