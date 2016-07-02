<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-25
 */
class askUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_ask.xml");
	}
	
	public static function getInstance(){
		if(is_null(askUIApi::$inst)){
			askUIApi::$inst = new askUIApi();
		}
		return askUIApi::$inst;
	}
	
	/**
	 * 按病种ID倒序排列
	 * 根据病种Id获取问题
	 * sid title date dod
	 * @param int $did 病种ID
	 * @param int $length (最多返回多少条,默认值4条)
	 * @return array fetchAll
	 */
	public function getQuestionsByDid($did,$length=4){
		$cache_key = "getQuestionsByDid-".$did."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDid");
		$ret = $this->db->fetchAll($sql, array(
			"did" => $did,
			"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 根据ASKID获取医生回答的第一条
	 * content
	 * @param int $did
	 * @return array fetch
	 */
	public function getAnswerByAskid($askid){
		$cache_key = "getAnswerByAskid-".$askid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_ask/getAnswerByAskid");
		$ret = $this->db->fetch($sql, array(
			"askid" => $askid
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 按医生ID获取提问问题,倒序排列
	 * sid title date did
	 * @param int $dod ID
	 * @param int $length (最多返回多少条,默认值5条)
	 * @return array fetchAll
	 */
	public function getQuestionsByDod($dod,$length=5){
		$cache_key = "getQuestionsByDod-".$dod."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDod");
		$ret = $this->db->fetchAll($sql, array(
				"dod" => $dod,
				"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	
	/**
	 * 获取大病种下的问答,倒序排序
	 * @param int $did 大病种ID
	 * @param int $length (最多返回多少条,默认值8条)
	 * @return array fetchAll
	 */
	public function getQuestionsByLv0Did($did,$length=8){
		$cache_key = "getQuestionsByLv0Did-".$did."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAllByLv0Did");
		$ret = $this->db->fetchAll($sql, array(
				"dod" => $dod,
				"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
}