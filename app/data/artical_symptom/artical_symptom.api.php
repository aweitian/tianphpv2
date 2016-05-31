<?php
/**
 * Date: 2016年5月31日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class articalSymptomApi{
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager("artical_doc");
 	}
 	
 	/**
 	 * 根据 大症状ID,小症状ID,标题中包含的字符来查询文章
 	 * 返回值的RETURN中包含data和count
 	 * @param int $lv0id	大症状ID
 	 * @param int $lv1id	小症状ID	0不限制
 	 * @param string $q		查询字符串
 	 * @param int $offset	分页参数
 	 * @param int $len		分页参数
 	 * @return rirResult
 	 */
 	public function query($lv0id,$lv1id,$q,$offset,$len){
 		$cache_sqlmanager = $this->sqlManager;
 		$where_bind = array();
 		$sql_count = $cache_sqlmanager->getSql("/articalSymptom/query_on_raw_count");
 		$where_clause = array();
 		if(intval($lv0id) != 0){
 			$where_clause[] = $cache_sqlmanager->getSql("/articalSymptom/where_clause_lv0");
 			$where_bind["lv0id"] = $lv0id;
 		}
 		if(intval($lv1id) != 0){
 			$where_clause[] = $cache_sqlmanager->getSql("/articalSymptom/where_clause_lv1");
 			$where_bind["lv1id"] = $lv1id;
 		}
 		if($q != ""){
 			$where_clause[] = $cache_sqlmanager->getSql("/articalSymptom/where_clause_title");
 			$where_bind["title"] = $q;
 		}
 	
 		$where_clause = join(" AND ", $where_clause);
 		if($where_clause != ""){
 			$where_clause = " WHERE " . $where_clause;
 		}
 		$sql = $sql_count . $where_clause;
 		$cnt = $this->db->fetch($sql, $where_bind);
 	
 		$cnt = $cnt["count"];
 	
 		$sql = strtr($cache_sqlmanager->getSql("/articalSymptom/query_on_raw"),array(
 				"@WHERECLAUSE" => $where_clause
 		));
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
 	 * 获取所有没有相关到疾病的文章
 	 * 返回值的RETURN中包含data和count
 	 * @param int $offset	分页参数
 	 * @param int $len		分页参数
 	 * @return rirResult
 	 */
 	public function allNotRel($offset,$len){
 		$cache_sqlmanager = $this->sqlManager;
 		$sql_count = $cache_sqlmanager->getSql("/articalSymptom/reldis_homeless/count");
 	
 		$sql = $sql_count;
 		$cnt = $this->db->fetch($sql, array());
 	
 		$cnt = $cnt["count"];
 	
 		$sql = strtr($cache_sqlmanager->getSql("/articalSymptom/reldis_homeless/query"),array());
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
 	 * 打断文章和疾病的关联
 	 *
 	 * @param int $aid	文章ID
 	 * @param int $did	疾病ID
 	 * @return rirResult
 	 */
 	public function disconnect($aid,$syd){
 		$ret = $this->db->exec($this->sqlManager->getSql("/articalSymptom/rm"), array(
 				"aid" => $aid,
 				"syd" => $syd,
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
 	 * @param array $dd			疾病ID
 	 */
 	public function connect($idArr,$syd){
 		// 		var_dump($dd);exit;
 		foreach ($idArr as $id){
 			$exists = $this->db->fetch(
 				$this->sqlManager->getSql("/articalSymptom/exists"), 
 				array(
 					"aid" => $id,
 					"syd" => $syd
 				)
 			);
 			if(empty($exists)){
 				// 				var_dump($id);exit;
 				$this->db->exec(
 					$this->sqlManager->getSql("/articalSymptom/add"), 
 					array(
 						"aid" => $id,
 						"syd" => $syd
 				));
 			}
 		}
 	}
 }