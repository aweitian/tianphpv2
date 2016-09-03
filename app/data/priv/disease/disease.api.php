<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname(__FILE__)."/diseaseValidator.php";
require_once FILE_SYSTEM_ENTRY.'/app/utility/tabDataToArray.php';
class diseaseApi{
	private $sqlManager;
	private $db;
	private $meta;
	private $count = 0;
	
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/disease.xml");
	}
	
	/**
	 * 树型结构到TABLE结构
	 * `pid`,`pd`,`mid`,`md`
	 * @return array;
	 */
	public function getInfo(){
		$sql = $this->sqlManager->getSql("/disease/tree2table");
		return $this->db->fetchAll($sql, array());
	}
	
	/**
	 * 获取大病种
	 * @return array
	 */
	public function getLv0Infoes(){
		$sql = $this->sqlManager->getSql("/disease/all_lv0");
		return $this->db->fetchAll($sql, array());
	}
	
	/**
	 * @return 返回影响的行数
	 * @param unknown $sid
	 */
	public function rm($sid){
		$sql = $this->sqlManager->getSql("/disease/removeById");
		$this->db->exec($sql, array(
			"sid" => $sid
		));
		$sql = $this->sqlManager->getSql("/disease/removeByPid");
		$this->db->exec($sql, array(
				"sid" => $sid
		));
	}
	
	public function row($sid){
		$sql = $this->sqlManager->getSql("/disease/getInfoById");
		return $this->db->fetch($sql, array(
				"sid" => $sid
		));
	}
	
	public function getData($pid){
		$sql = $this->sqlManager->getSql("/disease/getInfoes");
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
		$sql = $this->sqlManager->getSql("/disease/getLvById");
		$data = array(
				"sid" => $sid
		);
		$data = $this->db->fetch($sql, $data);
		if(empty($data)){
			return new rirResult(1,"invalid pid");
		}
		return new rirResult(0,"ok",$data["level"]);
	}
	
	public function edit($sid,$key,$data){
		$row = $this->row ( $sid );
		if (! $row)
			return new rirResult(1,"invalid sid");
// 		var_dump($row);exit;	
		if($row["key"] != $key) {
			$urkChk = App::checkControlExists($key);
			switch ($urkChk){
				case 0:
					break;
				case 1:
					return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(默认路由<a target='_blank' href='".AppUrl::build("/".$key)."'>点击查看</a>)占用");
				case 2:
					return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(医生模块<a target='_blank' href='".AppUrl::docHomeByDocid($key)."'>点击查看</a>)占用");
				case 3:
					return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(疾病模块<a target='_blank' href='".AppUrl::disHomeByDiseasekey($key)."'>点击查看</a>)占用");
				case 4:
					return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(栏目文章模块占用");
				default:
					return new rirResult(3,"URL检测未知错误");
			}			
		}

		$sql = $this->sqlManager->getSql("/disease/updateData");
		$data = array(
				"key" => $key,
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

	public function add($key,$data,$pid,$metaid){
		
		$urkChk = App::checkControlExists($key);
		switch ($urkChk){
			case 0:
				break;
			case 1:
				return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(默认路由<a target='_blank' href='".AppUrl::build("/".$key)."'>点击查看</a>)占用");
			case 2:
				return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(医生模块<a target='_blank' href='".AppUrl::docHomeByDocid($key)."'>点击查看</a>)占用");
			case 3:
				return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(疾病模块<a target='_blank' href='".AppUrl::disHomeByDiseasekey($key)."'>点击查看</a>)占用");
			case 4:
				return new rirResult(3,"疾病KEY用于URL，<br>但这个ID已被(栏目文章模块占用");
			default:
				return new rirResult(3,"URL检测未知错误");
		}
		
		$sql = $this->sqlManager->getSql("/disease/new_add");
		$data = array(
				"key" => $key,
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
	
	public function getNextMetaIdByGrpLv($lv){
		$sql = $this->sqlManager->getSql("/disease/meta/getNextMetaIdByGrpLv");
		$data = array(
				"level" => intval($lv),
				"grp" => DISEASE_GRP_ID
		);
		$ret = $this->db->fetch($sql, $data);
		if(empty($ret)){
			return new rirResult(1,$this->db->getErrorInfo());
		}
		return new rirResult(0,"ok",$ret["sid"]);
	}
	
	public function getMetaRow($sid){
		$sql = $this->sqlManager->getSql("/disease/meta/getInfoById");
		$data = array(
				"sid" => $sid
		);
		return $this->db->fetch($sql, $data);
	}
	
	
	
	public function getMeta(){
		$sql = $this->sqlManager->getSql("/disease/meta/getInfoesByGrp");
		$this->meta = $this->db->fetchAll($sql, array());
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
		$sql = $this->sqlManager->getSql("/disease/add");
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
