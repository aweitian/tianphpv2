<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/doctor_ext/doctor_ext.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/doctor_lv/doctor_lv.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/doctor/doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical/artical.api.php";

class doctorModel extends privModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
		$this->initSqlManager("doctor");
	}
	public function q_relart($offset,$len){
		$api = new doctorLvApi();
		return $api->getAllHomeless($offset, $len);
	}
	
	/**
	 * 连接医生职位(没有添加，有更新)
	 * @param int $dod
	 * @param int $lv
	 * @return rirResult
	 */
	public function connectLv($dod,$dlv){
		$api = new doctorLvApi();
		return $api->connect($dod, $dlv);
	}
	
	public function updateLv($dod,$dlv){
		return $this->connectLv($dod, $dlv);
	}
	
	
	
	public function getCacheDocInfo(){
		$api = new doctorLvApi();
		return $api->getLvInfo();
	}
	
	public function add($id,$name,$pwd,$avatar,$date){
		$api = new doctorApi();
		return $api->add($id, $name, $pwd, $avatar, $date);
	}
	
	public function getCacheDisease(){
		$api = new diseaseApi();
		return $api->getInfo();
	}
	
	/**
	 * 获取没有补充信息的医生
	 * sid  name       
	 * ------  -----------
     * 1  李美龙  
	 */
	public function getNoExtInfo(){
		$api = new doctorExtApi();
		return $api->getNoExtInfo();
	}
	
	/**
	 *
	 * @param string $q
	 * @param int $offset
	 * @param int $len
	 * @return array
	 */
	public function choose($q,$offset,$len){
		$api = new articalApi();
		return $api->choose($q, $offset, $len);
	}
	
	
	public function row($sid){
		$api = new doctorApi();
		return $api->row($sid);
	}
	public function getList($offset=0,$len=10){
		$api = new doctorApi();
		return $api->getList($offset,$len);
	}
	
	public function update($sid,$id,$name,$avatar,$date){
		$api = new doctorApi();
		return $api->update($sid, $id, $name, $avatar, $date);
	}
	
	public function forceResetPwd($sid,$pwd){
		$api = new doctorApi();
		return $api->forceResetPwd($sid, $pwd);
	}
	
	public function remove($sid){
		$api = new doctorApi();
		return $api->remove($sid);
	}
	
	public function doctor_lv_all(){
		$api = new doctorLvApi();
		return $api->all();
	}
	
	public function doctor_lv_add($data){
		$api = new doctorLvApi();
		return $api->add($data);
	}
	
	public function doctor_lv_update($sid,$data){
		$api = new doctorLvApi();
		return $api->update($sid, $data);
	}
	
	public function doctor_lv_remove($sid){
		$api = new doctorLvApi();
		return $api->remove($sid);
	}
	
	
	#### DOCTOR EXT
	public function ext_row($sid){
		$api = new doctorExtApi();
		return $api->row($sid);
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
	public function ext_add($dod,$dlv,$start,$hot,$love,$contribution,$desc,$spec){
		$api = new doctorExtApi();
		return $api->add($dod, $dlv, $start, $hot, $love, $contribution, $desc, $spec);
	}
	
	/**
	 *
	 * @param int $sid
	 * @param string $letter
	 * @return rirResult
	 */
	public function ext_update($dod,$dlv,$start,$hot,$love,$contribution,$desc,$spec){
		$api = new doctorExtApi();
		return $api->update($dod, $dlv, $start, $hot, $love, $contribution, $desc, $spec);
	}
	
	
	public function ext_remove($sid){
		$api = new doctorExtApi();
		return $api->remove($sid);
	}
	
	public function ext_getAll($offset,$length){
		$api = new doctorExtApi();
		return $api->getAll($offset, $length);
	}
	
}