<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname ( __FILE__ ) . "/filterMeta.validator.php";
require_once FILE_SYSTEM_ENTRY . "/lib/db/mysql/mysqlColumnInfo.php";
require_once FILE_SYSTEM_ENTRY . "/lib/db/mysql/mysqlTableInfo.php";

class filterMetaApi {
	private $sqlManager;
	private $db;
	public function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/priv/filter_meta.xml" );
	}
	
	/**
	 *
	 * @param string $type        	
	 * @param string $data
	 *        	(json)
	 * @param int $order        	
	 * @return rirResult
	 */
	public function add($type, $data, $order) {
		// validate
		if (! filterMetaValidator::isValidType ( $type )) {
			return new rirResult ( 1, "类型不正确" );
		}
		if (! filterMetaValidator::isValidData ( $data )) {
			return new rirResult ( 2, "META数据不能为空" );
		}
		if (! filterMetaValidator::isValidOrder ( $order )) {
			return new rirResult ( 3, "顺序只能为数字" );
		}
		
		if ($type == "range") {
			if (!$this->chkRange ( $data )) {
				return new rirResult ( 4, "数据库中已存在此条件" );
			}
			//检查字段 是否存在于表中
			$tbname = "data_hosipital";
			$tbinfo = new mysqlTableInfo ( $tbname );
			$cols = $tbinfo->getColumnNames ();
			if (!in_array($data, $cols)){
				return new rirResult ( 6, $field."字段在表中不存在" );
			}
			
		} else if ($type == "likestr") {
			if (!$this->chkLikestr ()) {
				return new rirResult ( 5, "数据库中已存在此条件" );
			}
			//检查字段 是否存在于表中
			$tbname = "data_hosipital";
			$tbinfo = new mysqlTableInfo ( $tbname );
			$cols = $tbinfo->getColumnNames ();
			$userFields = explode(",", $data);
			foreach ($userFields as $field){
				if(!in_array($field, $cols)){
					return new rirResult ( 6, $field."字段在表中不存在" );
				}
			}
			
		}
		
		$sql = $this->sqlManager->getSql ( "/filter_meta/add" );
		$bnd = array (
				"type" => $type,
				"data" => $data,
				"order" => $order 
		);
		$sid = $this->db->exec ( $sql, $bnd );
		if ($sid == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 9, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $sid );
	}
	
	/**
	 * 检查字段是否可以添加
	 * 
	 * @param string $field        	
	 * @return bool
	 */
	public function chkRange($field) {
		$sql = $this->sqlManager->getSql ( "/filter_meta/exist/range_chk" );
		$bnd = array (
				"data" => $field 
		);
		// var_dump($field,$this->db->fetch($sql, $bnd));
		return empty ( $this->db->fetch ( $sql, $bnd ) );
	}
	
	/**
	 * 检查是否可以添加模糊搜索
	 * 
	 * @return bool
	 */
	public function chkLikestr() {
		$sql = $this->sqlManager->getSql ( "/filter_meta/exist/likestr_chk" );
		$bnd = array ();
		return empty ( $this->db->fetch ( $sql, $bnd ) );
	}
	
	/**
	 * 返回1OK,0 FAILED
	 * 
	 * @param int $pid        	
	 * @return int;
	 */
	public function toggleEnabled() {
		$sql = $this->sqlManager->getSql ( "/filter_meta/toggle_enabled" );
		$bnd = array ();
		return $this->db->exec ( $sql, $bnd );
	}
	
	/**
	 * 返回1OK,0 FAILED
	 * 
	 * @param int $pid        	
	 * @return int;
	 */
	public function update($sid, $data, $order) {
		if (! filterMetaValidator::isValidData ( $data )) {
			return new rirResult ( 2, "META数据不能为空" );
		}
		if (! filterMetaValidator::isValidOrder ( $order )) {
			return new rirResult ( 3, "顺序只能为数字" );
		}
		
// 		$sql = $this->sqlManager->getSql("/filter_meta/row");
// 		$row = $this->db->fetch($sql, array("sid" => $sid));
// 		if(empty($row)){
// 			return new rirResult ( 7, "数据不存在" );
// 		}
// 		$type = $row["type"];
// 		if ($type == "range") {
// 			if (!$this->chkRange ( $data )) {
// 				return new rirResult ( 4, "数据库中已存在此条件" );
// 			}
// 			//检查字段 是否存在于表中
// 			$tbname = "data_hosipital";
// 			$tbinfo = new mysqlTableInfo ( $tbname );
// 			$cols = $tbinfo->getColumnNames ();
// 			if (!in_array($data, $cols)){
// 				return new rirResult ( 6, $field."字段在表中不存在" );
// 			}
				
// 		} else if ($type == "likestr") {
// 			if (!$this->chkLikestr ()) {
// 				return new rirResult ( 5, "数据库中已存在此条件" );
// 			}
// 			//检查字段 是否存在于表中
// 			$tbname = "data_hosipital";
// 			$tbinfo = new mysqlTableInfo ( $tbname );
// 			$cols = $tbinfo->getColumnNames ();
// 			$userFields = explode(",", $data);
// 			foreach ($userFields as $field){
// 				if(!in_array($field, $cols)){
// 					return new rirResult ( 6, $field."字段在表中不存在" );
// 				}
// 			}
				
// 		}
		
		$sql = $this->sqlManager->getSql ( "/filter_meta/update" );
		$bnd = array (
				"sid" => $sid,
				"data" => $data,
				"order" => $order 
		);
		$row = $this->db->exec ( $sql, $bnd );
		if ($row > 0){
			return new rirResult(0,"ok");
		}else{
			return new rirResult(1,$this->db->getErrorInfo());
		}
	}
	
	/**
	 * 删除
	 * 
	 * @param int $sid        	
	 * @return rirResult
	 */
	public function rm($sid) {
		// 先检查PID结点是否存在,并计算待删除结点的LEFT,RIGHT,SPAN
		$sql = $this->sqlManager->getSql ( "/filter_meta/rm" );
		$bnd = array (
				"sid" => $sid 
		);
		$sql = $this->sqlManager->getSql ( "/filter_meta/rm" );
		$ret = $this->db->exec ( $sql, $bnd );
		if ($ret == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	
	/**
	 * 返回一行记录
	 * 返回字段:sid,type,data,order
	 * 
	 * @return rirResult;
	 */
	public function row($sid) {
		$sql = $this->sqlManager->getSql ( "/filter_meta/row" );
		$ret = $this->db->fetch ( $sql, array (
				"sid" => $sid 
		) );
		if (empty ( $ret )) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	
	/**
	 * 返回字段:sid,name,url,order,layout
	 * 
	 * @return rirResult
	 */
	public function all() {
		$sql = $this->sqlManager->getSql ( "/filter_meta/all" );
		$ret = $this->db->fetchAll ( $sql, array () );
		if (empty ( $ret )) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	
	/**
	 *
	 * @param int $sid        	
	 * @param string $name        	
	 * @param string $url        	
	 * @param int $order        	
	 * @param string $layout        	
	 * @return rirResult
	 */
	public function devAll() {
		$sql = $this->sqlManager->getSql ( "/filter_meta/_dev_all" );
		$ret = $this->db->fetchAll ( $sql, array () );
		if (empty ( $ret )) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
}