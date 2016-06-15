<?php
/**
 * Date: 2016-05-14
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/letter/letter.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/user/user.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/doctor/doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/disease/disease.api.php";

class letterModel extends privModel{
	private $api;
	public function __construct(){
		parent::__construct();
		$this->api = new letterApi();
	}
	
	public function getWaterArm(){
		$api = new userApi();
		return $api->getWaterArm();
	}
	public function getInfo_doctor(){
		$api = new doctorApi();
		return $api->getBaseInfo();
	}
	public function getDisLv0(){
		$api = new diseaseApi();
		return $api->getLv0Infoes();
	}
	
	
	
	
	public function row($sid){
		return $this->api->row($sid);
	}
	
	/**
	 *
	 * @param int $uid
	 * @param int $dod
	 * @param int $did
	 * @param string $content
	 * @param date $date
	 * @return rirResult
	 */
	public function add($uid,$dod,$did,$content,$date){
		return $this->api->add($uid, $dod, $did, $content, $date);
	}
	
	public function getAll($offset,$length){
		return $this->api->getAll($offset, $length);
	}
	
	/**
	 *
	 * @param int $sid
	 * @param string $letter
	 * @return rirResult
	 */
	public function update($sid,$uid,$dod,$did,$content,$date){
		return $this->api->update($sid, $uid, $dod, $did, $content, $date);
	}
	
	
	public function remove($sid){
		return $this->api->remove($sid);
	}
	
	
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $uid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllLettersByUid($uid,$offset,$length){
		return $this->api->getAllLettersByUid($uid, $offset, $length);
	}
	
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $dod
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllLettersByDod($dod,$offset,$length){
		return $this->api->getAllLettersByDod($dod, $offset, $length);
	}
}