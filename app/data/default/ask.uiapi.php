<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-25
 */
class diseaseUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_ask.xml");
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
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDid");
		return $this->db->fetchAll($sql, array(
			"did" => $did,
			"length" => $length
		));
	}
	
	/**
	 * 根据ASKID获取医生回答的第一条
	 * content
	 * @param int $did
	 * @return array fetch
	 */
	public function getAnswerByAskid($askid){
		$sql = $this->sqlManager->getSql("/ui_ask/getAnswerByAskid");
		return $this->db->fetch($sql, array(
			"askid" => $askid
		));
	}
	
	/**
	 * 按医生ID获取提问问题,倒序排列
	 * sid title date did
	 * @param int $dod ID
	 * @param int $length (最多返回多少条,默认值5条)
	 * @return array fetchAll
	 */
	public function getQuestionsByDod($dod,$length=5){
		$sql = $this->sqlManager->getSql("/ui_ask/getAskByDod");
		return $this->db->fetchAll($sql, array(
				"dod" => $dod,
				"length" => $length
		));
	}
	
	
	
	/**
	 * 获取大病种下的问答,倒序排序
	 * @param int $did 大病种ID
	 * @param int $length (最多返回多少条,默认值8条)
	 * @return array fetchAll
	 */
	public function getQuestionByLv0Did($did,$length=8){
		$sql = $this->sqlManager->getSql("/ui_ask/getAllByLv0Did");
		return $this->db->fetchAll($sql, array(
				"dod" => $dod,
				"length" => $length
		));
	}
	
}