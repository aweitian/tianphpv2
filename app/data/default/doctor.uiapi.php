<?php
/**
 * 前台TPL文件调用医生信息接口类
 * @author awei.tian
 * @date   2016-6-25
 */
require_once FILE_SYSTEM_ENTRY."/app/data/_meta/doctorDutyMeta.php";
class doctorUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	private $docache = array();
	private $idcache = array();
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_doctor.xml");
		$this->initCache();
	}

	/**
	 * @return doctorUIApi
	 */
	public static function getInstance(){
		if(is_null(doctorUIApi::$inst)){
			doctorUIApi::$inst = new doctorUIApi();
		}
		return doctorUIApi::$inst;
	}
	
	
	/**
	 * 获取疾病ID，和医生对这个疾病的权重
	 *
	 * @param int $did
	 * @return string;
	 */
	public function getDidDataByDod($dod) {
		$cache_key = "getDidDataByDod-" . $dod;
		if (array_key_exists ( $cache_key, $this->cache )) {
			return $this->cache [$cache_key];
		}
		$sql = $this->sqlManager->getSql("/ui_doctor/getDidData_dod");
		$ret = $this->db->fetchAll($sql, array("dod" => $dod));
		$this->cache [$cache_key] = $ret;
		return $ret;
	}
	
	
	
	
	/**
	 * 获取医生姓名
	 * @param int $dod
	 * @return string;
	 */
	public function getNameByDod($dod){
		$cache_key = "getNameByDod-".$dod;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$ret = $this->getInfoByDod($dod);
		if(empty($ret)){
			$ret = "";
		}else{
			$ret = $ret["name"];
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * sid,id,name,lv,avatar,date,dod,dlv,star,hot,love,contribution,desc,spec
	 * 3  zdz     郑殿增        ccccccc  zdz.jpg  2016-05-16       3       3       0       0       0             0  doc     spce    
	 * @param int $dod
	 * @return array fetch;
	 */
	public function getInfoByDod($dod){
		$cache_key = "getInfoByDod-".$dod;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		if (array_key_exists($dod, $this->docache)){
			$ret = $this->docache[$dod];
		}else{
			$ret = array();
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 获取诊后服务星医生
	 * 返回字段:
	 * 		sid,id,name,lv,avatar,date,
	 * 		dod,dlv,star,hot,love,
	 * 		contribution,desc,spec
	 * @param int $length
	 */
	public function getTopStar($length){
		$cache_key = "getTopStar-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$ret = array();
		$ret = array_slice($this->docache, -1*$length,$length);
		
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	private function _cpm($a,$b){
		if ($a["star"] == $b["star"]) {
			return 0;
		} else {
			return $a["star"] > $b["star"] ? 1 : -1;
		}
	}
	
	/**
	 * sid,id,name,lv,avatar,date,dod,dlv,star,hot,love,contribution,desc,spec
	 * 3  zdz     郑殿增        ccccccc  zdz.jpg  2016-05-16       3       3       0       0       0             0  doc     spce    
	 * @param int $id
	 * @return array fetch;
	 */
	public function getInfoById($id){
		$cache_key = "getInfoById-".$id;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		if (array_key_exists($id, $this->idcache)){
			$ret = $this->idcache[$id];
		}else{
			$ret = array();
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * 检查医生ID是否存在
	 * @param string $id
	 * @return boolean
	 */
	public function exists($id){
		return array_key_exists($id, $this->idcache);
	}
	
	
	/**
	 * 返回字段:
	 * 		sid,id,name,lv,avatar,date,
	 * 		dod,dlv,star,hot,love,
	 * 		contribution,desc,spec
	 * @param int $length
	 * @return array:
	 */
	public function getInfoes($length,$offset=0){
		$cache_key = "getInfoes-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$ret = array_slice($this->docache, $offset,$length);
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	/**
	 * 获取所有医生的个数
	 * @return number
	 */
	public function getAllCnt(){
		return count($this->docache);
	}
	
	/**
	 * sid,id,name,lv,avatar,date,dod,dlv,star,hot,love,contribution,desc,spec
	 * @return array
	 */
	public function getAll(){
		return $this->docache;
	}
	
	private function initCache(){
		$data = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_doctor/all"), array());
		foreach($data as $item){
			$this->docache[$item["sid"]] = $item;
			$this->idcache[$item["id"]] = $item;
		}
	}
	

}