<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
class articalModel extends privModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
		$this->initSqlManager("artical");
	}

	public function row($sid){
		$ret = $this->db->fetch($this->sqlManager->getSql("/sql/row"), array(
				"sid" => $sid
		));
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	
	public function getCacheDisease(){
		$ret = $this->db->fetchAll(sqlManager::getInstance("cache")->getSql("/sql/disease/query_on_raw"), array(
	
		));
		return $ret;
	}
	
	public function con_reldis($idArr,$dd){
// 		var_dump($dd);exit;
		foreach ($idArr as $id){
			$exists = $this->db->fetch(sqlManager::getInstance("artical_ext")->getSql("/sql/exists"), array(
				"aid" => $id,
				"did" => $dd
			));	
			if(empty($exists)){
// 				var_dump($id);exit;
				$this->db->exec(sqlManager::getInstance("artical_ext")->getSql("/sql/add"), array(
						"aid" => $id,
						"did" => $dd
				));
			}		
		}

		
	}
	
	
	
	public function q_reldis($offset,$len){
		$cache_sqlmanager = new sqlManager("cache");
		$sql_count = $cache_sqlmanager->getSql("/sql/artical_disease/reldis_homeless/count");

		$sql = $sql_count;
		$cnt = $this->db->fetch($sql, array());
		
		$cnt = $cnt["count"];
		
		$sql = strtr($cache_sqlmanager->getSql("/sql/artical_disease/reldis_homeless/query"),array());
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
	public function q_revreldis($dcid,$diid,$q,$offset,$len){
		$cache_sqlmanager = new sqlManager("cache");
		$where_bind = array();
		$sql_count = $cache_sqlmanager->getSql("/sql/artical_disease/query_on_raw_count");
		$where_clause = array();
		if(intval($dcid) != 0){
			$where_clause[] = $cache_sqlmanager->getSql("/sql/artical_disease/where_clause_dc");
			$where_bind["dcid"] = $dcid;
		}
		if(intval($diid) != 0){
			$where_clause[] = $cache_sqlmanager->getSql("/sql/artical_disease/where_clause_di");
			$where_bind["diid"] = $diid;
		}
		if($q != ""){
			$where_clause[] = $cache_sqlmanager->getSql("/sql/artical_disease/where_clause_title");
			$where_bind["title"] = $q;
		}
		
		$where_clause = join(" AND ", $where_clause);
		if($where_clause != ""){
			$where_clause = " WHERE " . $where_clause;
		}
		$sql = $sql_count . $where_clause;
		$cnt = $this->db->fetch($sql, $where_bind);
		
		$cnt = $cnt["count"];
		
		$sql = strtr($cache_sqlmanager->getSql("/sql/artical_disease/query_on_raw"),array(
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
	
	public function disconRelDis($aid,$did){
		$ret = $this->db->exec(sqlManager::getInstance("artical_ext")->getSql("/sql/rm"), array(
				"aid" => $aid,
				"did" => $did,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	
	public function q($q,$offset,$len){
		$cnt = $this->db->fetch($this->sqlManager->getSql("/sql/query_count"), array(
				"q" => $q
		));
		
		$cnt = $cnt["count"];
		
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/query"), array(
				"q" => $q,
				"offset" => $offset,
				"length" => $len
		));
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
	
	
	public function getDisList(){
		$cnt = $this->db->fetch(sqlManager::getInstance("")->getSql("/sql/count"), array());
		
		$cnt = $cnt["count"];
		
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/all"), array(
			"offset" => $offset,
			"length" => $len
		));
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
	
	public function getList($offset=0,$len=10){
		$cnt = $this->db->fetch($this->sqlManager->getSql("/sql/count"), array());
		
		$cnt = $cnt["count"];
		
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/all"), array(
			"offset" => $offset,
			"length" => $len
		));
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
	
	public function add($title,$content,$date){
		if(!artical_validator::isValidTitle($title)){
			return new rirResult(2,"invalid title of post");
		}
		if(!artical_validator::isValidContent($content)){
			return new rirResult(2,"invalid content of post");
		}
		if(!validator::isDate($date)){
			return new rirResult(2,"invalid date of post");
		}
		$ret = $this->db->insert($this->sqlManager->getSql("/sql/add"), array(
			"title" => $title,
			"content" => $content,
			"date" => $date
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function update($sid,$title,$content,$date){
		if(!artical_validator::isValidTitle($title)){
			return new rirResult(2,"invalid title of post");
		}
		if(!artical_validator::isValidContent($content)){
			return new rirResult(2,"invalid content of post");
		}
		if(!validator::isDate($date)){
			return new rirResult(2,"invalid date of post");
		}
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/update"), array(
			"sid" => $sid,
			"title" => $title,
			"content" => $content,
			"date" => $date
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function remove($sid){
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/remove"), array(
			"sid" => $sid,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
}