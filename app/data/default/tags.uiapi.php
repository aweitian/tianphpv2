<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class tagsUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_tags.xml");
	}
	
	
	/**
	 * 按病种ID获取所有兄弟结点
	 * aid,kw,desc,thumb,title,date
	 * @param int $did 病种ID
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getAll($did,$length){
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
			return array_merge($thumbnail,$others);
		}else{
			$sql = $this->sqlManager->getSql("/ui_article/allByDid");
			return $this->db->fetchAll($sql, array(
					"did" => $did,
					"length" => $length
			));
		}
	}
	
}