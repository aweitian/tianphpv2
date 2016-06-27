<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/askValidator.php";
require_once dirname(__FILE__)."/askFilter.php";
 class askAppendApi{
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/ask.xml");
 	}
 	
 	
 	public function add($askid,$role,$conmeta,$content,$files,$date){
 		//validate data
 		if(!validator::isUint($askid)){
 			return new rirResult(1,"invalid ask id");
 		}
 		if(!askValidator::isValidSvr($role)){
 			return new rirResult(2,"invalid role");
 		}
 		if(!askValidator::isValidConmeta($conmeta)){
 			return new rirResult(4,"invalid content meta data");
 		}
 		if(!askValidator::isValidDesc($content)){
 			return new rirResult(3,"invalid content");
 		}
 		if(!askValidator::isValidFiles($files)){
 			return new rirResult(7,"invalid files");
 		}
 		if(!validator::isDateTime($date)){
 			return new rirResult(8,"invalid date");
 		}
 	
 		//filter
 		$files = askFilter::fileFilter($files);
 	
 		$sql = $this->sqlManager->getSql("/ask/append/add");
 		$bnd = array(
 				"askid" => $askid,
 				"role" => $role,
 				"conmeta" => $conmeta,
 				"content" => $content,
 				"files" => $files,
 				"date" => $date
 		);
 		$sid = $this->db->insert($sql, $bnd);
 		if($sid == 0){
 			if($this->db->hasError()){
 				return new rirResult(9,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",$sid);
 	}
 	
 	public function update($sid,$askid,$role,$conmeta,$content,$files,$date){
 		//validate data
 		if(!validator::isUint($askid)){
 			return new rirResult(1,"invalid ask id");
 		}
 		if(!askValidator::isValidSvr($role)){
 			return new rirResult(2,"invalid role");
 		}
 		if(!askValidator::isValidConmeta($conmeta)){
 			return new rirResult(4,"invalid content meta data");
 		}
 		if(!askValidator::isValidDesc($content)){
 			return new rirResult(3,"invalid content");
 		}
 		if(!askValidator::isValidFiles($files)){
 			return new rirResult(7,"invalid files");
 		}
 		if(!validator::isDateTime($date)){
 			return new rirResult(8,"invalid date");
 		}
 	
 		//filter
 		$files = askFilter::fileFilter($files);
 	
 		$sql = $this->sqlManager->getSql("/ask/append/update");
 		$bnd = array(
 				"sid" => $sid,
 				"askid" => $askid,
 				"role" => $role,
 				"conmeta" => $conmeta,
 				"content" => $content,
 				"files" => $files,
 				"date" => $date,
 		);
 		$sid = $this->db->exec($sql, $bnd);
 		if($sid == 0){
 			if($this->db->hasError()){
 				return new rirResult(9,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",$sid);
 	
 	}
 	public function remove($sid){
 		$ret = $this->db->exec($this->sqlManager->getSql("/ask/append/rm"), array(
 				"sid" => $sid,
 		));
 		if($ret == 0){
 			if($this->db->hasError()){
 				return new rirResult(1,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",$ret);
 	}
 	
 	
 	public function getDataByAskid($askid){
 		$sql = $this->sqlManager->getSql("/ask/append/view");
 		return $this->db->fetchAll($sql, array("askid" => $askid));
 	}
 }