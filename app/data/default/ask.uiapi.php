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
	 * @param int $limit (最多返回多少条)
	 * @return array fetchAll
	 */
	public function getAskQuestionByDid($did,$limit=4){
		$sql = $this->sqlManager->getSql("/ui_ask/getAskAnswerByDid/ask");
		return $this->db->fetchAll($sql, array(
				"did" => $did,
				"length" => $limit
		));
	}
	
	/**
	 * 根据ASKID获取医生回答的第一条
	 * content
	 * @param int $did
	 * @return array fetch
	 */
	public function getAskAnswerByDid($askid){
		$sql = $this->sqlManager->getSql("/ui_ask/getAskAnswerByDid/answer");
		return $this->db->fetch($sql, array(
				"askid" => $askid
		));
	}
	
	
}