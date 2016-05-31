<?php
/**
 * Date: 2016年5月30日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class articalDoctorApi {
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager("artical_doc");
 	}
 	/**
 	 * 根据 医生ID,标题中包含的字来查询文章
 	 * 返回值的RETURN中包含data和count
 	 * @param int $doid		 医生ID	0不限制
 	 * @param string $q		查询字符串
 	 * @param int $offset	分页参数
 	 * @param int $len		分页参数
 	 * @return rirResult
 	 */
 	public function query($doid,$q,$offset,$len){
 		$cache_sqlmanager = $this->sqlManager;
 		$where_bind = array();
 		$sql_count = $cache_sqlmanager->getSql("/sql/query_on_raw_count");
 		$where_clause = array();
 		if(intval($doid) != 0){
 			$where_clause[] = $cache_sqlmanager->getSql("/sql/where_clause_do");
 			$where_bind["dod"] = $doid;
 		}
 	
 		if($q != ""){
 			$where_clause[] = $cache_sqlmanager->getSql("/sql/where_clause_title");
 			$where_bind["title"] = $q;
 		}
 	
 		$where_clause = join(" AND ", $where_clause);
 		if($where_clause != ""){
 			$where_clause = " WHERE " . $where_clause;
 		}
 		$sql = $sql_count . $where_clause;
 		$cnt = $this->db->fetch($sql, $where_bind);
 	
 		$cnt = $cnt["count"];
 	
 		$sql = strtr($cache_sqlmanager->getSql("/sql/query_on_raw"),array(
 				"@WHERECLAUSE" => $where_clause
 		));
 		$where_bind["offset"] = $offset;
 		$where_bind["length"] = $len;
 	
 		// 		var_dump($sql);exit;
 	
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
 	 * 获取所有没有相关到医生的文章
 	 * 返回值的RETURN中包含data和count
 	 * @param int $offset	分页参数
 	 * @param int $len		分页参数
 	 * @return rirResult
 	 */
 	public function allNotRel($offset,$len){
 		$cache_sqlmanager = $this->sqlManager;
		$sql_count = $cache_sqlmanager->getSql("/sql/reldoc_homeless/count");

		$sql = $sql_count;
		$cnt = $this->db->fetch($sql, array());
		
		$cnt = $cnt["count"];
		
		$sql = strtr($cache_sqlmanager->getSql("/sql/reldoc_homeless/query"),array());
		$where_bind = array();
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
 	 * 打断文章和医生的关联
 	 * 
 	 * @param int $aid	文章ID
 	 * @param int $did	医生ID
 	 * @return rirResult
 	 */
 	public function disconnect($aid,$dod){
 		$ret = $this->db->exec($this->sqlManager->getSql("/sql/rm"), array(
 			"aid" => $aid,
 			"dod" => $dod,
 		));
 		if($ret == 0){
 			if($this->db->hasError()){
 				return new rirResult(1,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",$ret);
 	}
 	/**
 	 * 没有返回值
 	 * @param array $idArr		文章ID数组
 	 * @param array $dd			医生ID
 	 */
 	public function connect($idArr,$dd){
 		foreach ($idArr as $id){
 			$exists = $this->db->fetch($this->sqlManager->getSql("/sql/exists"), array(
 					"aid" => $id,
 					"dod" => $dd
 			));
 			if(empty($exists)){
 				$this->db->exec($this->sqlManager->getSql("/sql/add"), array(
 						"aid" => $id,
 						"dod" => $dd
 				));
 			}
 		}
 	}
 }