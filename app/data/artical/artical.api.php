<?php
/**
 * Date: 2016年5月30日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/artical_filter.php";
require_once dirname(__FILE__)."/artical_validator.php";
 class articalApi {
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager("artical");
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
 	/**
 	 * return => array(data=>array(),count=>int)
 	 * @param string $q
 	 * @param int $offset
 	 * @param int $len
 	 * @return rirResult
 	 */
 	public function query($q,$offset,$len){
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
 	/**
 	 * return => array(data=>array(),count=>int)
 	 * @param number $offset
 	 * @param number $len
 	 * @return rirResult
 	 */
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
 	
 	/**
 	 * OK,RETURN is INSERT ID
 	 * @param string $title
 	 * @param string $content
 	 * @param datetime $date
 	 * @return rirResult
 	 */
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
 	
 	/**
 	 * return is affectedrows
 	 * @param int $sid
 	 * @param string $title
 	 * @param string $content
 	 * @param datetime $date
 	 * @return rirResult
 	 */
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
 	/**
 	 * 
 	 * @param int $sid
 	 * @return rirResult
 	 */
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