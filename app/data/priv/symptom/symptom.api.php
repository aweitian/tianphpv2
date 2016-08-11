<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
class symptomApi{
	private $sqlManager;
	private $db;
	private $meta;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/symptom.xml");
	}

	/**
	 * 树型结构到TABLE结构
	 * `pid`,`pd`,`mid`,`md`
	 * @return array;
	 */
	public function getInfo(){
		$sql = $this->sqlManager->getSql("/symptom/tree2table");
		return $this->db->fetchAll($sql, array());
	}
	


	public function rm($sid){
		$sql = $this->sqlManager->getSql("/symptom/removeById");
		$this->db->exec($sql, array(
				"sid" => $sid
		));
		$sql = $this->sqlManager->getSql("/symptom/removeByPid");
		$this->db->exec($sql, array(
				"sid" => $sid
		));
	}
	
	
	
	public function getData($pid){
		$sql = $this->sqlManager->getSql("/symptom/getInfoes");
		$data = array(
			"pid" => $pid
		);
		return $this->db->fetchAll($sql, $data);
	}
	/**
	 * @return rirResult
	 * @param int $sid
	 */
	public function getLvBySid($sid){
		$sql = $this->sqlManager->getSql("/symptom/getLvById");
		$data = array(
			"sid" => $sid
		);
		$data = $this->db->fetch($sql, $data);
// 		var_dump($sid);exit;
		if(empty($data)){
			return new rirResult(1,"invalid pid");
		}
		return new rirResult(0,"ok",$data["level"]);
	}
	
	public function edit($sid,$data){
		$sql = $this->sqlManager->getSql("/symptom/updateData");
		$data = array(
				"data" => $data,
				"sid" => $sid,
		);
	
		$ret = $this->db->exec($sql, $data);
		if($ret == 0){
			if($this->db->getErrorCode() == mysqlPdoBase::NONERRCODE){
				return new rirResult(0,"ok",$ret);
			}
			return new rirResult(1,$this->db->getErrorInfo());
		}
		return new rirResult(0,"ok",$ret);
	}
	public function add($data,$pid,$grp,$metaid){
		$sql = $this->sqlManager->getSql("/symptom/add");
		$data = array(
				"data" => $data,
				"pid" => $pid,
				"metaid" => $metaid,
		);
		$ret = $this->db->insert($sql, $data);
		if($ret == 0){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function getNextMetaIdByGrpLv($grp,$lv){
		$sql = $this->sqlManager->getSql("/symptom/meta/getNextMetaIdByGrpLv");
		$data = array(
				"level" => intval($lv),
				"grp" => $grp
		);
		$ret = $this->db->fetch($sql, $data);
		if(empty($ret)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		return new rirResult(0,"ok",$ret["sid"]);
	}
	
	public function row($sid){
		$sql = $this->sqlManager->getSql("/symptom/getInfoById");
		$data = array(
				"sid" => $sid
		);
		return $this->db->fetch($sql, $data);
	}
	
	
	
	public function getMeta(){
		$this->meta = $this->db->fetchAll($this->sqlManager->getSql("/symptom/meta/getInfoesByGrp"), array(
				"grp" => SYMPTOM_GRP_ID
		));
		return $this->meta;
	}
	
	
	/**
	 *
	 * @param array $data
	 * @return int rows
	 */
	public function import($data){
		$this->getMeta();
		if(empty($this->meta)){
			return 0;
		}
		$this->count = 0;
		//var_dump($this->meta);
		$this->forestTra($data, array($this,"append"));
		return $this->count;
	}
	
	private function append($pid,$key,$arr,$depth,$index){
		if(count($this->meta)<=$depth)return 0;
		$sql = $this->sqlManager->getSql("/symptom/add");
		$data = array(
				"data" => $key,
				"pid"  => $pid,
				"metaid" => $this->meta[$depth]["sid"]
		);
	
		return $this->db->insert($sql, $data);
	}
	
	/**
	 *
	 * @param array $data
	 * @param callback $callback
	 */
	private function forestTra($data,$callback){
		//forest 遍历
		$i = 0;
		foreach ($data as $k => $v){
			$this->_helper_treeArrTra($callback,0,$k,$v,0,$i++);
		}
	}
	private function _helper_treeArrTra($callback,$pid,$key,$arr,$depth,$index){
		$pid = call_user_func_array($callback, array($pid,$key,$arr,$depth,$index));
		if($pid == 0)return 0;
		$this->count++;
		$i = 0;
		foreach ($arr as $k => $v){
			$this->_helper_treeArrTra($callback,$pid,$k,$v,$depth+1,$i++);
		}
	}
}