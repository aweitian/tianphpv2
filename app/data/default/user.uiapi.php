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
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_user.xml");
	}
	
	public static function getInstance(){
		if(is_null(appraiseUIApi::$inst)){
			appraiseUIApi::$inst = new appraiseUIApi();
		}
		return appraiseUIApi::$inst;
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
		$sql = $this->sqlManager->getSql("/ui_user/row_uid");
		$ret = $this->db->fetch($sql, array(
			"uid" => $uid
		));
		$this->cache[$cache_key] = $ret;
		return $ret;
	}
	
}