<?php
require_once dirname(__FILE__)."/doctor_lv.validator.php";
class doctorLvApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("doctor_lv");
	}
	
	public function getAllHomeless($offset,$length){
		$sql = $this->sqlManager->getSql("/doctor_lv/homeless/count");
		$bin = array();
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/doctor_lv/homeless/query");
		$ret = $this->db->fetchAll($sql, $bin);
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
	 * dod name dmd(`data_doctor_lv_meta`.`sid`) lv
	 * @return array;
	 */
	public function getLvInfo(){
		$sql = $this->sqlManager->getSql("/sql/query_infoLv");
		$bind = array();
		return $this->db->fetchAll($sql, $bind);
	}
	
	/**
	 * 连接医生职位(没有添加，有更新)
	 * @param int $dod
	 * @param int $lv
	 * @return rirResult
	 */
	public function connect($dod,$lv){
		$ret = $this->db->fetch($this->sqlManager->getSql("/sql/lv/row"), array("dod"=>$dod));
		if(empty($ret)){
			$sid = $this->db->insert($this->sqlManager->getSql("/sql/lv/add"), array("dod"=>$dod,"dlv"=>$lv));
			if($sid == 0){
				if($this->db->hasError()){
					return new rirResult(1,$this->db->getErrorInfo());
				}
			}
			return new rirResult(0,"ok",$sid);
		}else{
			$row = $this->db->exec($this->sqlManager->getSql("/sql/lv/update"), array("dod"=>$dod,"dlv"=>$lv));
			if($row == 0){
				if($this->db->hasError()){
					return new rirResult(1,$this->db->getErrorInfo());
				}
			}
			return new rirResult(0,"ok",$row);
		}
	}

	/**
	 * 获取META
	 * @return rirResult
	 */
	public function all(){
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/sql/all"), array());
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	/**
	 * 操作META
	 * @param string $data
	 * @return rirResult
	 */
	public function add($data){
		if(!doctorLvValidator::isValidDoctorLv($data)){
			return new rirResult(2,"invalid data of post");
		}
		$ret = $this->db->insert($this->sqlManager->getSql("/sql/add"), array(
				"data" => $data
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	/**
	 * 操作META
	 * @param int $sid
	 * @param string $data
	 * @return rirResult
	 */
	public function update($sid,$data){
		if(!doctorLvValidator::isValidDoctorLv($data)){
			return new rirResult(2,"invalid data of post");
		}
		$ret = $this->db->exec($this->sqlManager->getSql("/sql/update"), array(
				"sid" => $sid,
				"data" => $data
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	/**
	 * 操作META
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