<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/appraiseValidator.php";
class appraiseApi{
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("appraise");
	}
	
	public function row($sid){
		$sql = $this->sqlManager->getSql("/appraise/row");
		$bnd = array("sid" => $sid);
		return $this->db->fetch($sql, $bnd);
	}
	
	public static function getAppraiseMeta($i=null){
		$meta = array("一般","满意","很满意");
		if(is_numeric($i) && $i >=0 && $i < count($meta)){
			return $meta[$i];
		}
		return $meta;
	} 
	
	/**
	 *
	 * @param int $uid
	 * @param int $dod
	 * @param int $did
	 * @param int $lv
	 * @param string $txt
	 * @param date $date
	 * @return rirResult
	 */
	public function add($uid,$did,$dod,$txt,$lv,$date){
		//validate data
		if(!validator::isDate($date)){
			return new rirResult(1,"invalid date");
		}
		if(!validator::isUint($uid)){
			return new rirResult(2,"invalid uid");
		}
		if(!validator::isUint($dod)){
			return new rirResult(3,"invalid dod");
		}
		if(!validator::isUint($did)){
			return new rirResult(4,"invalid did");
		}
		if(!validator::isUint($lv)){
			return new rirResult(5,"invalid appraise");
		}
		if(!appraiseValidator::isValidContent($txt)){
			return new rirResult(6,"invalid content");
		}
		
		$sql = $this->sqlManager->getSql("/appraise/add");
		$bind = array(
			"uid" => $uid,
			"did" => $did,
			"dod" => $dod,
			"txt" => $txt,
			"lv"  => $lv,
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
	 *
	 * @param int $sid
	 * @param string $appraise
	 * @return rirResult
	 */
	public function update($sid,$uid,$did,$dod,$txt,$lv,$date){
	
		//validate data
		if(!validator::isDate($date)){
			return new rirResult(1,"invalid date");
		}
		if(!validator::isUint($uid)){
			return new rirResult(2,"invalid uid");
		}
		if(!validator::isUint($dod)){
			return new rirResult(3,"invalid dod");
		}
		if(!validator::isUint($did)){
			return new rirResult(4,"invalid did");
		}
		if(!validator::isUint($lv)){
			return new rirResult(5,"invalid appraise");
		}
		if(!appraiseValidator::isValidContent($txt)){
			return new rirResult(6,"invalid content");
		}
	
		$sql = $this->sqlManager->getSql("/appraise/update");
		$bind = array(
			"sid" => $sid,
			"uid" => $uid,
			"did" => $did,
			"dod" => $dod,
			"txt" => $txt,
			"lv" => $lv,
			"date" => $date,
		);
		$sid = $this->db->exec($sql, $bind);
		if($sid == 0){
			if($this->db->hasError()){
				return new rirResult(9,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$sid);
	}
	
	
	public function remove($sid){
		$ret = $this->db->exec($this->sqlManager->getSql("/appraise/rm"), array(
				"sid" => $sid,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $uid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllAppraisesByUid($uid,$offset,$length){
		$sql = $this->sqlManager->getSql("/appraise/all_uid/cnt");
		$bin = array("uid" => $uid);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/appraise/all_uid/query");
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
	public function getAllAppraisesByDod($dod,$offset,$length){
		$sql = $this->sqlManager->getSql("/appraise/all_dod/cnt");
		$bin = array("dod" => $dod);
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/appraise/all_dod/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	
	
	public function getAll($offset,$length){
		$sql = $this->sqlManager->getSql("/appraise/all/cnt");
		$bin = array();
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/appraise/all/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	
}
