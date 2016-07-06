<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class userUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private $waterArmCache = array();
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_user.xml");
		$this->initWaterArm();
		
	}
	
	/**
	 * @return userUIApi
	 */
	public static function getInstance(){
		if(is_null(userUIApi::$inst)){
			userUIApi::$inst = new userUIApi();
		}
		return userUIApi::$inst;
	}
	
	
	/**
	 * 获取用户姓名
	 * @param int $uid
	 * @return string;
	 */
	public function getNameByUid($uid){
		$cache_key = "getNameByUid-".$uid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		$ret = $this->row($uid);
		if(empty($ret)){
			$ret = "";
		}else{
			$ret = $ret["name"];
		}
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	/**
	 * 返回字段:sid,email,name,phone,avatar,rpq,rpa,wa,date
	 * 字段说明:
	 * 		rpq为密码找回问题,
	 * 		rpa为密码找回答案
	 * 		wa y为水军，n为正常注册用户
	 * @param int $uid
	 * @return array;
	 */
	public function row($uid){
		$cache_key = "row-".$uid;
		if (array_key_exists($cache_key, $this->cache)){
			return $this->cache[$cache_key];
		}
		if (!array_key_exists($uid, $this->waterArmCache)){
			$sql = $this->sqlManager->getSql("/ui_user/row_uid");
			$ret = $this->db->fetch($sql, array(
				"uid" => $uid
			));			
		}else{
			$ret = $this->waterArmCache[$uid];
		}

		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
	
	private function initWaterArm(){
		$data = $this->db->fetchAll(
				$this->sqlManager->getSql("/ui_user/waterarm"), array());
		foreach($data as $item){
			$this->waterArmCache[$item["sid"]] = $item;
		}
	}
	
}