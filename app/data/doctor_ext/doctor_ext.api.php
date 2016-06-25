<?php
require_once dirname(__FILE__)."/doctor_ext.validator.php";
class doctorExtApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("doctor_ext");
	}
	
	
	public function row($sid){
		$sql = $this->sqlManager->getSql("/doctor_ext/row");
		$bnd = array("sid" => $sid);
		return $this->db->fetch($sql, $bnd);
	}
	
	/**
	 *
	 * @param int $uid
	 * @param int $dod
	 * @param int $did
	 * @param string $content
	 * @param date $date
	 * @return rirResult
	 */
	public function add($dod,$dlv,$start,$hot,$love,$contribution,$desc,$spec){
		//validate data
		if(!validator::isUint($dod)){
			return new rirResult(2,"invalid dod");
		}
		if(!validator::isUint($dlv)){
			return new rirResult(3,"invalid dlv");
		}
		if(!validator::isUint($start)){
			return new rirResult(4,"invalid start");
		}
		if(!validator::isFloat($hot)){
			return new rirResult(4,"invalid hot");
		}
		if(!validator::isUint($love)){
			return new rirResult(4,"invalid love");
		}
		if(!validator::isUint($contribution)){
			return new rirResult(4,"invalid contribution");
		}
		if(!doctorExtValidator::isValidDesc($desc)){
			return new rirResult(5,"invalid desc");
		}
		if(!doctorExtValidator::isValidSpec($spec)){
			return new rirResult(5,"invalid spec");
		}
	
		$sql = $this->sqlManager->getSql("/doctor_ext/add");
		$bind = array(
			"dod" => $dod,
			"dlv" => $dlv,
			"start" => $start,
			"hot" => $hot,
			"love" => $love,
			"contribution" => $contribution,
			"desc" => $desc,
			"spec" => $spec,
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
	 * @param string $letter
	 * @return rirResult
	 */
	public function update($dod,$dlv,$start,$hot,$love,$contribution,$desc,$spec){
	
		//validate data
		if(!validator::isUint($dod)){
			return new rirResult(2,"invalid dod");
		}
		if(!validator::isUint($dlv)){
			return new rirResult(3,"invalid dlv");
		}
		if(!validator::isUint($start)){
			return new rirResult(4,"invalid start");
		}
		if(!validator::isFloat($hot)){
			return new rirResult(4,"invalid hot");
		}
		if(!validator::isUint($love)){
			return new rirResult(4,"invalid love");
		}
		if(!validator::isUint($contribution)){
			return new rirResult(4,"invalid contribution");
		}
		if(!doctorExtValidator::isValidDesc($desc)){
			return new rirResult(5,"invalid desc");
		}
		if(!doctorExtValidator::isValidSpec($spec)){
			return new rirResult(5,"invalid spec");
		}
	
		$sql = $this->sqlManager->getSql("/doctor_ext/update");
		$bind =array(
			"dod" => $dod,
			"dlv" => $dlv,
			"start" => $start,
			"hot" => $hot,
			"love" => $love,
			"contribution" => $contribution,
			"desc" => $desc,
			"spec" => $spec,
		
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
		$ret = $this->db->exec($this->sqlManager->getSql("/doctor_ext/rm"), array(
				"sid" => $sid,
		));
		if($ret == 0){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function getAll($offset,$length){
		$sql = $this->sqlManager->getSql("/doctor_ext/all/cnt");
		$bin = array();
		$row = $this->db->fetch($sql, $bin);
		if(empty($row)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		$cnt = $row["count"];
		$bin["offset"] = $offset;
		$bin["length"] = $length;
		$sql = $this->sqlManager->getSql("/doctor_ext/all/query");
		$data = $this->db->fetchAll($sql, $bin);
		return new rirResult(0,$cnt,$data);
	}
	
	
}