<?php
/**
 * 前台TPL文件调用文章模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class diseaseUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("ui_disease");
	}
	
	
	public function getInfo() {
		$sql = $this->sqlManager->getSql("/ui_disease/tree2table");
		return $this->db->fetchAll($sql, array());
	}
	
	public function getRowByDiskey($urlkey) {
		$sql = $this->sqlManager->getSql("/ui_disease/row_disease_url");
		return $this->db->fetchAll($sql, array(
			"key" => $urlkey
		));
	}
	
}