<?php
/**
 * 前台TPL文件调用添加问答模块接口类
 * @author awei.tian
 * @date   2016-6-27
 */
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/IOp.php";
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/oplog.php";
require_once FILE_SYSTEM_ENTRY . "/modules/captcha/captcha.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/_meta/avatarMeta.php";
require_once FILE_SYSTEM_ENTRY . "/app/data/priv/ask/askValidator.php";
class putUIApi {
	private static $inst = null;
	private $sqlManager;
	private $db;
	private $cache = array();
	
	private function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_put.xml");
	}
	
	/**
	 * @return putUIApi
	 */
	public static function getInstance(){
		if(is_null(putUIApi::$inst)){
			putUIApi::$inst = new putUIApi();
		}
		return putUIApi::$inst;
	}
	
	/**
	 *
	 * @param int $did
	 * @param int $uid
	 * @param int $dod
	 * @param string $title
	 * @param string $desc
	 * @param string $svr
	 * @return 数字 大于 0 正常，0数据库错误，负数见代码
	 */
	public function add($uid,$dod,$title,$did,$desc,$svr,$date) {
		$op_type = "user_submit";
		$op_id = $uid;
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, $op_id );
		if (USER_SUBMIT_TRY_MAX - $try_cnt <= 0) {
			return -9;
		}
		$opsid = $oplog->add ( $op_type, $op_id );
		$oplog->update ( $opsid );
	
		if(utility::utf8Strlen($desc) > 2048){
			return -10;
		}
		if(utility::utf8Strlen($svr) > 2048){
			return -11;
		}
		//validate data
		if(!validator::isUint($uid)){
			return -1;
		}
		if(!validator::isUint($dod)){
			return -2;
		}
		if(!askValidator::isValidTitle($title)){
			return -3;
		}
		if(!validator::isUint($did)){
			return -4;
		}
		if(!askValidator::isValidDesc($desc)){
			return -5;
		}
		if(!askValidator::isValidSvr($svr)){
			return -6;
		}
		if(!askValidator::isValidFiles($files)){
			return -7;
		}
		if(!validator::isDateTime($date)){
			return -8;
		}
		$sql = $this->sqlManager->getSql("/ui_put/add");
		$bnd = array(
				"uid" => $uid,
				"dod" => $dod,
				"title" => $title,
				"did" => $did,
				"desc" => $desc,
				"svr" => $svr,
				"date" => $date,
		);
		
		$sid = $this->db->insert($sql, $bind);
		
		return $sid;
	}
	
	
	
	
	
	
	
	
}
