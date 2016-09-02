<?php
/**
 * Date: 2016年5月31日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
class articleTreeApi {
	private $sqlManager;
	private $db;
	public function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/priv/article_tree.xml" );
	}
	
	/**
	 * 不管当前状态，以最少的操作变成新状态
	 * aid + id 唯一
	 * 
	 * @param int $aid        	
	 * @param array $idArr        	
	 * @return int 插入，更新，删除的总行数
	 */
	public function update($aid, $trd) {
		if (! validator::isUint ( $aid ) || ! validator::isUint ( $trd )) {
// 			var_dump($aid, $trd);exit;
			return 0;
		}
		$sql = $this->sqlManager->getSql ( "/articleTree/update" );
		$bnd = array ();
		$bnd ["aid"] = $aid;
		$bnd ["trd"] = $trd;
		return $this->db->exec ( $sql, $bnd );
	}
	
	
	public function row($aid){
		if ( ! validator::isUint ( $aid )) {
			return array();
		}
		return $this->db->fetch ( $this->sqlManager->getSql ( "/articleTree/row" ), array (
				"aid" => $aid,
		) );
	}	
	/**
	 * 打断文章和疾病的关联
	 *
	 * @param int $aid        	
	 * @param int $did        	
	 * @return rirResult
	 */
	public function rm($aid) {
		if ( ! validator::isUint ( $aid )) {
			return array();
		}
		return $this->db->exec ( $this->sqlManager->getSql ( "/articleTree/rm" ), array (
				"aid" => $aid,
		) );
	}
	
	/**
	 * 没有返回值
	 * 
	 * @param array $idArr        	
	 * @param array $dd        	
	 */
	public function add($aid, $trd) {
		if (! validator::isUint ( $aid ) || ! validator::isUint ( $trd )) {
			return 0;
		}
		return $this->db->insert ( $this->sqlManager->getSql ( "/articleTree/add" ), array (
				"aid" => $aid,
				"trd" => $trd,
		) );
	}
	/**
	 *
	 * @param int $aid        	
	 * @return array int dod
	 */
	public function all($trd,$length,$offset) {
		if ( ! validator::isUint ( $trd )) {
			return array();
		}
		return $this->db->fetchAll ( $this->sqlManager->getSql ( "/articleTree/all" ), array (
				"trd" => $trd ,
				"offset" => $offset ,
				"length" => $length 
		) );
	}
}