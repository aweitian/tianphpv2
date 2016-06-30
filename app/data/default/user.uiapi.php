<?php
/**
 * 前台TPL文件调用问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class userUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_user.xml");
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
		$sql = $this->sqlManager->getSql("/ui_user/row_uid");
		return $this->db->fetch($sql, array(
			"uid" => $uid
		));
	}
	
}