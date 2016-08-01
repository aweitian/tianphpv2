<?php
/**
 * Date: 2016年5月30日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class hosFilApi {
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/hosipital_filterset.xml");
 	}
 	
 	/**
 	 * 返回这个医院的集合今集的选择情况
 	 * @param int $hid
 	 * @return rirResult
 	 */
 	public function showDetail($hid){
 		$sql = $this->sqlManager->getSql("/hosipital_filterset/showDetail");
 		$bnd = array("hid" => $hid);
 		$ret = $this->db->fetchAll($sql,$bnd);
 		if(empty($ret)){
 			if($this->db->hasError()){
 				return new rirResult(1,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",$ret);
 	}
 	
 	public function exists($hid,$mid){
		$sql = $this->sqlManager->getSql ( "/hosipital_filterset/exists" );
		$bnd = array (
				"hid" => $hid,
				"mid" => $mid 
		);
		$ret = $this->db->fetch ( $sql, $bnd );
		return $ret;
 	}
 	
 	
 	/**
 	 * 获取所有没有相关到疾病的文章
 	 * 返回值的RETURN中包含data和count
 	 * @param int $offset	分页参数
 	 * @param int $len		分页参数
 	 * @return rirResult
 	 */
 	public function allNotRel($mid,$offset,$len){
 		$cache_sqlmanager = $this->sqlManager;
 		$sql_count = $cache_sqlmanager->getSql("/hosipital_filterset/homeless/cnt");
 	
 		$sql = $sql_count;
 		$cnt = $this->db->fetch($sql, array("mid" => $mid));
 	
 		$cnt = $cnt["cnt"];
 	
 		$sql = $cache_sqlmanager->getSql("/hosipital_filterset/homeless/query");
 		$where_bind = array("mid" => $mid);
 		$where_bind["offset"] = $offset;
 		$where_bind["length"] = $len;
 		$ret = $this->db->fetchAll($sql,$where_bind);
 		if(empty($ret)){
 			if($this->db->hasError()){
 				return new rirResult(1,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",array(
 			"data" => $ret,
 			"count" => $cnt
 		));
 	}
 	
 	/**
 	 * 打断文章和疾病的关联
 	 * 
 	 * @param int $fsid	文章ID
 	 * @param int $hid	疾病ID
 	 * @return rirResult
 	 */
 	public function remove($hid,$mid){
 		$ret = $this->db->exec($this->sqlManager->getSql("/hosipital_filterset/rm"), array(
 			"mid" => $mid,
 			"hid" => $hid,
 		));
 		if($ret == 0){
 			if($this->db->hasError()){
 				return new rirResult(1,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",$ret);
 	}
	
	/**
	 * 
	 * 
	 * @param int $hid        	
	 * @param int $fsid  
	 * @return rirResult      	
	 */
	public function add($hid, $fsid) {
		// var_dump($dd);exit;
		$sql = $this->sqlManager->getSql ( "/hosipital_filterset/add" );
		$bnd = array ();
		$bnd ["hid"] = $hid;
		$bnd ["fsid"] = $fsid;
		$ret = $this->db->insert ( $sql, $bnd );
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	/**
	 * 
	 * 
	 * @param int $hid        	
	 * @param int $fsid  
	 * @return rirResult      	
	 */
	public function update($hid, $fsid,$oldfsid) {
		// var_dump($dd);exit;
		$sql = $this->sqlManager->getSql ( "/hosipital_filterset/update" );
		$bnd = array ();
		$bnd ["hid"] = $hid;
		$bnd ["newfsid"] = $fsid;
		$bnd ["oldfsid"] = $oldfsid;
		$ret = $this->db->exec ( $sql, $bnd );
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
 }