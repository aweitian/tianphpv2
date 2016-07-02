<?php
/**
 * 前台TPL文件调用医生信息接口类
 * @author awei.tian
 * @date   2016-6-25
 */
class doctorUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_doctor.xml");
	}

	public static function getInstance(){
		if(is_null(doctorUIApi::$inst)){
			doctorUIApi::$inst = new doctorUIApi();
		}
		return doctorUIApi::$inst;
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
		
		$ret = $this->db->fetch($this->sqlManager->getSql("/ui_doctor/name"), array("dod"=>$dod));
		if(empty($ret)){
			$ret = "";
		}else{
			$ret = $ret["name"];
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	/**
	 * sid,id,name,lv,avatar,date,dod,dlv,start,hot,love,contribution,desc,spec
	 * 3  zdz     郑殿增        ccccccc  zdz.jpg  2016-05-16       3       3       0       0       0             0  doc     spce    
	 * @param int $dod
	 * @return array fetch;
	 */
	public function getInfoByDod($dod){
		$cache_key = "getInfoByDod-".$dod;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$ret = $this->db->fetch($this->sqlManager->getSql("/ui_doctor/infoByDid"), array(
			"dod" => $dod
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	public function getInfoes($length){
		$cache_key = "getInfoes-".$length;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$ret = $this->db->fetchAll($this->sqlManager->getSql("/ui_doctor/infoes"), array(
			"length" => $length
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
}