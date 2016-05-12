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