<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
class diseaseModel extends privModel{
	/**
	 * 
	 * @var sqlManager
	 */
	private $meta_sqlManager;
	
	private $meta;
	private $count = 0;
	public function __construct(){
		parent::__construct();
		$this->initDb();
		$this->initSqlManager("attr_data");
		$this->meta_sqlManager = new sqlManager("attr_meta");
	}
	
	
	public function rm($sid){
		$child_sql = $this->sqlManager->getSql("/sql/removeByPid");
		$this->db->exec($child_sql, array(
			"pid" => $sid
		));
		
		$sql = $this->sqlManager->getSql("/sql/removeById");
		$this->db->exec($sql, array(
			"sid" => $sid
		));
	}
	
	
	
	public function getData($pid){
		$sql = $this->sqlManager->getSql("/sql/getInfoesByGrp");
		$data = array(
				"grp" => DISEASE_GRP_ID,
				"pid" => $pid
		);
		return $this->db->fetchAll($sql, $data);
	}
	/**
	 * @return rirResult
	 * @param int $sid
	 */
	public function getLvBySid($sid){
		$sql = $this->sqlManager->getSql("/sql/getLvById");
		$data = array(
				"sid" => $sid
		);
		$data = $this->db->fetch($sql, $data);
		if(empty($data)){
			return new rirResult(1,"invalid pid");
		}
		return new rirResult(0,"ok",$data["level"]);
	}
	
	public function edit($sid,$data){
		$sql = $this->sqlManager->getSql("/sql/updateData");
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
		$sql = $this->sqlManager->getSql("/sql/add");
		$data = array(
				"data" => $data,
				"pid" => $pid,
				"metaid" => $metaid,
				"grp" => $grp
		);
		$ret = $this->db->insert($sql, $data);
		if($ret == 0){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		return new rirResult(0,"ok",$ret);
	}
	
	public function getNextMetaIdByGrpLv($grp,$lv){
		$sql = $this->meta_sqlManager->getSql("/sql/getNextMetaIdByGrpLv");
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
		$sql = $this->sqlManager->getSql("/sql/getInfoById");
		$data = array(
			"sid" => $sid
		);
		return $this->db->fetch($sql, $data);
	}
	
	
	
	public function getMeta(){
		$this->meta = $this->db->fetchAll($this->meta_sqlManager->getSql("/sql/getInfoesByGrp"), array(
				"grp" => DISEASE_GRP_ID
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
		$sql = $this->sqlManager->getSql("/sql/add");
		$data = array(
			"data" => $key,
			"pid"  => $pid,
			"grp"  => $this->meta[$depth]["grp"],
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