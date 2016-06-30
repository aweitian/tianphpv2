<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class articleUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_article.xml");
	}
	
	/**
	 * 按病种ID获取文章,第一篇带THUMBNAIL(最多返回一个，有可能为0)
	 * aid,kw,desc,thumb,title,date
	 * @param int $did 病种ID
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getAllThumbnail($did,$length){
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
	
	/**
	 * 按病种ID获取第一篇带THUMBNAIL文章(最多返回一个，有可能为0)
	 * aid,kw,desc,thumb,title,date
	 * @param int $did 病种ID
	 * @return array fetch
	 */
	public function getRowThumbnailByDid($did){
		$sql = $this->sqlManager->getSql("/ui_article/row_thumb_did");
		$thumbnail = $this->db->fetch($sql, array(
			"did" => $did
		));
		return $thumbnail;
	}
	
	/**
	 * 根据DID获取病种下所有文章
	 * aid,kw,desc,thumb,title,date
	 * @param int $did
	 * @param int $length
	 * @return array fetchAll
	 */
	public function getAll($did,$length){
		$sql = $this->sqlManager->getSql("/ui_article/allByDid");
		return $this->db->fetchAll($sql, array(
			"did" => $did,
			"length" => $length
		));
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
		$sql = $this->sqlManager->getSql("/ui_article/allByDid_Exc");
		return $this->db->fetchAll($sql, array(
			"did" => $did,
			"exc" => $exc,
			"length" => $length
		));
	}
	
	
}