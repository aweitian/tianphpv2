<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class symptomUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_symptom.xml");
	}
	
	/**
	 * 随机获取二级症状,参数length最多获取多少个
	 * 返回字段:aid,kw,desc,thumb,title,date
	 * @param int $length
	 * @return array fetchAll
	 */
	public function all($length){
		$sql = $this->sqlManager->getSql("/ui_symptom/all_rand");
		return $this->db->fetch($sql, array(
				"length" => $length
		));
	}
	
	
}