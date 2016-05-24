<?php
/**
 * Date: 2016-05-21
 * Author: Awei.tian
 * Description: 
 */
class askModel extends privModel{
	public function __construct(){
		parent::__construct();
		$this->initMySqlDb();
		$this->initSqlManager("ask");
		
	}
	
	public function test(){
		return "hi";
	}
	
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param string $q
	 * @param int $offset
	 * @param int $len
	 * @return rirResult
	 */
	public function queryUsr($q,$offset,$len){
		if(!is_null($q) && $q != ""){
			$sql_cnt = $this->sqlManager->getSql("/ask/usr/condition/count");
			$sql_all = $this->sqlManager->getSql("/ask/usr/condition/query");
			$cnt_bnd = array("q" => $q);
			$all_bnd = array("q" => $q,"offset" => $offset,"length" => $len);
		}else{
			$sql_cnt = $this->sqlManager->getSql("/ask/usr/all/count");
			$sql_all = $this->sqlManager->getSql("/ask/usr/all/query");
			$cnt_bnd = array();
			$all_bnd = array("offset" => $offset,"length" => $len);
		}
		
		
		$cnt = $this->db->fetch($sql_cnt,$cnt_bnd);
	
		$cnt = $cnt["count"];
	
		$ret = $this->db->fetchAll($sql_all, $all_bnd);
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,$cnt,$ret);
	}
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * 
	 * @param int $uid
	 * @param int $dod
	 * @param string $title
	 * @param int $did
	 * @param string $desc
	 * @param string $svr
	 * @param string $files
	 * @param date $date
	 * @return rirResult
	 */
	public function add($uid,$dod,$title,$did,$desc,$svr,$files,$date){
		
		//validate data
		if(!validator::isUint($uid)){
			return new rirResult(1,"invalid uid");
		}
		if(!validator::isUint($dod)){
			return new rirResult(2,"invalid dod");
		}
		if(!askValidator::isValidTitle($title)){
			return new rirResult(3,"invalid title");
		}
		if(!validator::isUint($did)){
			return new rirResult(4,"invalid did");
		}
		if(!askValidator::isValidDesc($desc)){
			return new rirResult(5,"invalid desc");
		}
		if(!askValidator::isValidSvr($svr)){
			return new rirResult(6,"invalid svr");
		}
		if(!askValidator::isValidFiles($files)){
			return new rirResult(7,"invalid files");
		}
		if(!validator::isDateTime($date)){
			return new rirResult(8,"invalid date");
		}
		
		//filter
		$files = askFilter::fileFilter($files);
		
		$sql = $this->sqlManager->getSql("/ask/add");
		$bind = array(
			"uid" => $uid,
			"dod" => $dod,
			"title" => $title,
			"did" => $did,
			"desc" => $desc,
			"svr" => $svr,
			"files" => $files,
			"date" => $date,
		);
		$sid = $this->db->insert($sql, $bind);
		if($sid == 0){
			if($this->db->hasError()){
				return new rirResult(9,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$sid);
	}
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $uid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllAskByUid($uid,$offset,$length){
		$sql = $this->sqlManager->getSql("/ask/all_uid/count");
		$bin = array("uid" => $uid);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/ask/all_uid/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $dod
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllAskByDod($dod,$offset,$length){
		$sql = $this->sqlManager->getSql("/ask/all_dod/count");
		$bin = array("dod" => $dod);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/ask/all_dod/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	
	
	
	public function getAllDoc(){
		$sql = $this->sqlManager->getSql("/ask/all_doctor");
		return $this->db->fetchAll($sql, array());
	}
	
	public function getAllDis(){
		$sql = sqlManager::getInstance("cache")->getSql("/sql/disease/query_on_raw");
		return $this->db->fetchAll($sql, array());
	}
	
}