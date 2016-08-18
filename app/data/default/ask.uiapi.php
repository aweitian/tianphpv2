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
	/**
	 * @return askUIApi
	 */
	public static function getInstance(){
		if(is_null(askUIApi::$inst)){
			askUIApi::$inst = new askUIApi();
		}
		return askUIApi::$inst;
	}
	
	/**
	 * 根据病种Id获取问题个数
	 * @param int $did 病种ID
	 * @return int
	 */
	public function getQuestionsCountByDid($did){
		$cache_key = "getQuestionsCountByDid-".$did;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDidCnt");
		$ret = $this->db->fetch($sql, array(
			"did" => $did,
		));
		$ret = $ret["cnt"];
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 根据病种Id获取问题个数
	 * @param int $did
	 * @return int
	 */
	public function getQuestionsByDidCnt($did){
		return $this->getQuestionsCountByDid($did);
	}
	/**
	 * 按病种ID倒序排列
	 * 根据病种Id获取问题
	 * sid title date dod
	 * @param int $did 病种ID
	 * @param int $length (最多返回多少条,默认值4条)
	 * @return array fetchAll
	 */
	public function getQuestionsByDid($did,$length=4,$offset=0){
		$cache_key = "getQuestionsByDid-".$did."-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDid");
		$ret = $this->db->fetchAll($sql, array(
			"did" => $did,
			"offset" => $offset,
			"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	
	/**
	 * 根据病种Id获取问题个数
	 * @param int $did
	 * @return int
	 */
	public function getQuestionsByUidCnt($uid){
		$cache_key = "getQuestionsByUidCnt-".$uid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByUidCnt");
		$ret = $this->db->fetch($sql, array(
				"dod" => $dod,
		));
		$ret = $ret["cnt"];
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 按病种ID倒序排列
	 * 根据病种Id获取问题
	 * sid title date dod
	 * @param int $did 病种ID
	 * @param int $length (最多返回多少条,默认值4条)
	 * @return array fetchAll
	 */
	public function getQuestionsByUid($uid,$length=4,$offset=0){
		$cache_key = "getQuestionsByUid-".$uid."-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByUid");
		$ret = $this->db->fetchAll($sql, array(
			"uid" => $uid,
			"offset" => $offset,
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
// 		var_dump($sql,$askid);exit;
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 按医生ID获取提问问题个数
	 * @param int $dod ID
	 * @return int
	 */
	public function getQuestionsCountByDod($dod){
		$cache_key = "getQuestionsCountByDod-".$dod;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDodCnt");
		$ret = $this->db->fetch($sql, array(
				"dod" => $dod,
		));
		$ret = $ret["cnt"];
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
	public function getQuestionsByDod($dod,$length=5,$offset=0){
		$cache_key = "getQuestionsByDod-".$dod."-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDod");
		$ret = $this->db->fetchAll($sql, array(
				"dod" => $dod,
				"offset" => $offset,
				"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	
	/**
	 * 获取大病种下的问答的个数
	 * @param int $did 大病种ID
	 * @return int
	 */
	public function getQuestionsCountByLv0Did($did){
		$cache_key = "getQuestionsCountByLv0Did-".$did;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAllByLv0DidCnt");
		$ret = $this->db->fetch($sql, array(
				"did" => $did
		));
		$ret = $ret["cnt"];
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 获取大病种下的问答,倒序排序
	 * 返回字段:sid,uid,dod,title,did,desc,svr,files,date
	 * @param int $did 大病种ID
	 * @param int $length (最多返回多少条,默认值8条)
	 * @return array fetchAll
	 */
	public function getQuestionsByLv0Did($did,$length=8,$offset=0){
		$cache_key = "getQuestionsByLv0Did-".$did."-".$length."-".$offset;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/getAllByLv0Did");
		$ret = $this->db->fetchAll($sql, array(
				"did" => $did,
				"offset" => $offset,
				"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 返回所有问题个数
	 * @return int;
	 */
	public function getAllQuestionsCnt(){
		$cache_key = "getAllQuestionsCnt";
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
	
		$sql = $this->sqlManager->getSql("/ui_ask/cnt");
		$cnt = $this->db->fetch($sql, array());
		//	var_dump($sql);exit;
		$ret = $cnt["cnt"];
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	
	/**
	 * 返回COUNT,DATA数组
	 * DATA的字段为:sid,title,date,dod
	 * @param int $offset
	 * @param int $length
	 * @return array;
	 */
	public function getAllQuestions($offset,$length){
		$cache_key = "getAllQuestions-".$offset."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/cnt");
		$cnt = $this->db->fetch($sql, array());
// 		var_dump($sql);exit;
		$cnt = $cnt["cnt"];
		$sql = $this->sqlManager->getSql("/ui_ask/all");
		$data = $this->db->fetchAll($sql, array(
			"offset" => $offset,
			"length" => $length
		));
		$ret = array(
			"count" => $cnt,
			"data"  => $data
		);
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * sid,uid,dod,title,did,desc,svr,files,date   
	 * @param int $askid 
	 * @return array;
	 */
	public function getQuestionByAskid($askid){
		$cache_key = "getQuestionByAskid-".$askid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		
		$sql = $this->sqlManager->getSql("/ui_ask/row");
		$ret = $this->db->fetch($sql, array("sid" => $askid));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * 
	 * @param int $askid
	 * @param int $offset
	 * @param int $length
	 */
	public function getAnswers($askid,$length,$offset=0){
		$cache_key = "getAnswers-".$askid."-".$offset."-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_ask/rows_answer");
		$bnd = array(
			"askid" => $askid,
			"offset" => $offset,
			"length" => $length	
		);
		$ret = $this->db->fetchAll($sql, $bnd);
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 
	 * @param int $askid
	 * @return int
	 */
	public function getAnswersCnt($askid){
		$cache_key = "getAnswersCnt-".$askid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_ask/rows_answerCnt");
		$bnd = array(
			"askid" => $askid,
		);
		$data = $this->db->fetch($sql, $bnd);
		$ret = $data["cnt"];
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 获取医生回答的个数
	 * @param int $askid
	 * @return int
	 */
	public function getAnswersDocReplyCnt($askid){
		$cache_key = "getAnswersDocReplyCnt-".$askid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_ask/rows_answerDocReplyCnt");
		$bnd = array(
			"askid" => $askid,
		);
		$data = $this->db->fetch($sql, $bnd);
		$ret = $data["cnt"];
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
}