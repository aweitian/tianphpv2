<?php
/**
 * Date: 2016-05-21
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/ask/ask.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/ask/askAppend.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/doctor/doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/disease/disease.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/user/user.api.php";
class askModel extends privModel{
	public $msg;
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param string $q
	 * @param int $offset
	 * @param int $len
	 * @return rirResult
	 */
	public function queryUsr($q,$offset,$len){
		$api = new askApi();
		return $api->queryUsr($q, $offset, $len);
	}
	
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param string $q
	 * @param int $offset
	 * @param int $len
	 * @return rirResult
	 */
	public function queryDoc($q,$offset,$len){
		$api = new askApi();
		return $api->queryDoc($q, $offset, $len);
	}
	
	public function row($sid){
		$api = new askApi();
		return $api->row($sid);
	}
	
	/**
	 * 
	 * @param int $uid
	 * @param int $dod
	 * @param string $title
	 * @param int $did
	 * @param string $desc
	 * @param string $svr
	 * @param string $files
	 * @param date $date
	 * @return rirResult
	 */
	public function add($uid,$dod,$title,$did,$desc,$svr,$files,$date){
		$api = new askApi();
		return $api->add($uid, $dod, $title, $did, $desc, $svr, $files, $date);
	}
	/**
	 * 
	 * @param int $sid
	 * @param int $dod
	 * @param string $title
	 * @param int $did
	 * @param string $desc
	 * @param string $svr
	 * @param string $files
	 * @param date $date
	 * @return rirResult
	 */
	public function update($sid,$uid,$dod,$title,$did,$desc,$svr,$files,$date){
		$api = new askApi();
		return $api->update($sid, $uid, $dod, $title, $did, $desc, $svr, $files, $date);
	}
	
	
	
	public function appendAdd($askid,$role,$conmeta,$content,$files,$date){
		$api = new askAppendApi();
		return $api->add($askid, $role, $conmeta, $content, $files, $date);
	}
	
	public function appendUpdate($sid,$askid,$role,$conmeta,$content,$files,$date){
		$api = new askAppendApi();
		return $api->update($sid, $askid, $role, $conmeta, $content, $files, $date);
	}
	public function appendRemove($sid){
		$api = new askAppendApi();
		return $api->remove($sid);
	}	
	
	
	public function remove($sid){
		$api = new askApi();
		return $api->remove($sid);
	}
	public function removeAppend($sid){
		$api = new askApi();
		return $api->removeAppend($sid);
	}
	
	
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $uid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllAskByUid($uid,$offset,$length){
		$api = new askApi();
		return $api->getAllAskByUid($uid, $offset, $length);
	}
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $dod
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllAskByDod($dod,$offset,$length){
		$api = new askApi();
		return $api->getAllAskByDod($dod, $offset, $length);
	}
	
	public function getAll($offset,$length){
		$api = new askApi();
		return $api->getAll($length,$offset);
	}
	
	
	public function getQueryAll($q,$offset,$length){
		$api = new askApi();
		return $api->getQueryAll($q,$length,$offset);
	}
	public function verify($sid){
		$api = new askApi();
		return $api->verify($sid);
	}
	
	public function getAppendByAskid($askid){
		$api = new askAppendApi();
		return $api->getDataByAskid($askid);
	}
	
	public function getAppendRow($sid){
		$api = new askAppendApi();
		return $api->row($sid);
	}
	
	public function getAllDoc(){
		$api = new doctorApi();
		return $api->getBaseInfo();
	}
	
	public function getAllDis(){
		$api = new diseaseApi();
		return $api->getInfo();
	}
	
	
	public function getAllPresent(){
		$api = new askApi();
		return $api->getAllPresent();
	}
	
	public function getWaterArm(){
		$api = new userApi();
		return $api->getWaterArm();
	}
	
}