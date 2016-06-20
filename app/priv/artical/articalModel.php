<?php
/**
 * Date: 2016-05-12
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/user/user.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/doctor/doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical/artical.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/disease/disease.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/symptom/symptom.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_disease/artical_disease.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_symptom/artical_symptom.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_doctor/artical_doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_tags/artical_tags.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/tags/tags.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/comment/comment.api.php";

class articalModel extends privModel{
	public function __construct(){
		parent::__construct();
	}
	public function row($sid){
		$api = new articalApi();
		return $api->row($sid);
	}
	public function row_comment($sid){
		$api = new commentApi();
		return $api->row($sid);
	}
	public function getCacheDoctor(){
		$api = new doctorApi();
		return $api->getInfoLv();
	}
	public function getCacheDisease(){
		$api = new diseaseApi();
		return $api->getInfo();
	}
	
	/* get INFOES  */
	public function getInfo_disease(){
		$api = new diseaseApi();
		return $api->getInfo();
	}
	public function getWaterArm(){
		$api = new userApi();
		return $api->getWaterArm();
	}
	public function getInfo_symptom(){
		$api = new symptomApi();
		return $api->getInfo();
	}
	
	public function getInfo_doctor(){
		$api = new doctorApi();
		return $api->getBaseInfo();
	}
	
	public function getInfo_tags(){
		$api = new tagsApi();
		$ret = $api->getAll();
		if($ret->isTrue()){
			return $ret->return;
		}
		return array();
	}
	
	
	public function con_relsym($idArr,$syd){
		if(!is_array($syd)){
			$syd = array($syd);
		}
		$api = new articalSymptomApi();
		return $api->connect($idArr, $syd);
	}
	
	public function con_reldis($idArr,$dd){
		if(!is_array($dd)){
			$dd = array($dd);
		}
		$api = new articalDiseaseApi();
		return $api->connect($idArr, $dd);
	}
	public function con_reldoc($idArr,$dd){
		if(!is_array($dd)){
			$dd = array($dd);
		}
		$api = new articalDoctorApi();
		return $api->connect($idArr, $dd);
	}
	
	public function q_reldoc_aid($aid){
		$api = new articalDoctorApi();
		return $api->row($aid);
	}
	public function q_reldis_aid($aid){
		$api = new articalDiseaseApi();
		return $api->row($aid);
	}
	public function q_relsym_aid($aid){
		$api = new articalSymptomApi();
		return $api->row($aid);
	}
	public function q_tags_aid($aid){
		$api = new articalTagsApi();
		return $api->row($aid);
	}
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getAllComments($q,$offset,$length){
		$api = new commentApi();
		return $api->getAllComments($q,$offset, $length);
	}
	/**
	 * 成功，INFO字段为COUNT,RETURN为数据
	 * @param int $aid
	 * @param int $offset
	 * @param int $length
	 * @return rirResult
	 */
	public function getCommentsByAid($aid,$offset,$length){
		$api = new commentApi();
		return $api->getAllCommentsByAid($aid, $offset, $length);
	}
	
	public function q_reldoc($offset,$len){
		$api = new articalDoctorApi();
		return $api->allNotRel($offset, $len);
	}
	public function q_reldis($offset,$len){
		$api = new articalDiseaseApi();
		return $api->allNotRel($offset, $len);
	}
	public function q_revreldis($dcid,$diid,$q,$offset,$len){
		$api = new articalDiseaseApi();
		return $api->query($dcid, $diid, $q, $offset, $len);
	}
	public function q_revreldoc($doid,$q,$offset,$len){
		$api = new articalDoctorApi();
		return $api->query($doid, $q, $offset, $len);
	}
	
	public function updateTags($aid,$tidArr){
		$api = new articalTagsApi();
		return $api->update($aid, $tidArr);
	}
	
	public function disconRelDis($aid,$did){
		$api = new articalDiseaseApi();
		return $api->disconnect($aid, $did);
	}
	public function disconRelDoc($aid,$dod){
		$api = new articalDoctorApi();
		return $api->disconnect($aid, $dod);
	}
	
	public function q($q,$offset,$len){
		$api = new articalApi();
		return $api->query($q, $offset, $len);
	}
	
	public function getList($offset=0,$len=10){
		$api = new articalApi();
		return $api->getList($offset,$len);
	}
	/**
	 * 
	 * @param int $aid
	 * @param int $uid
	 * @param string $comment
	 * @return rirResult
	 */
	public function addComment($aid,$uid,$comment){
		$api = new commentApi();
		return $api->add($aid, $uid, $comment);
	}
	
	public function vertifyComment($sid){
		$api = new commentApi();
		return $api->vertify($sid);
	}
	
	/**
	 * OK,RETURN is INSERT ID
	 * @param string $title
	 * @param string $content
	 * @param datetime $date
	 * @return rirResult
	 */
	public function add($kw,$desc,$thumb,$title,$content,$date){
		$api = new articalApi();
		return $api->add($kw,$desc,$thumb,$title,$content, $date);
	}
	
	public function update($sid,$kw,$desc,$thumb,$title,$content,$date){
		$api = new articalApi();
		return $api->update($sid,$kw,$desc,$thumb,$title,$content,$date);
	}
	public function updateComment($sid,$uid,$comment,$datetime){
		$api = new commentApi();
		return $api->updatePriv($sid, $uid, $comment, $datetime);
	}
	
	public function remove($sid){
		$api = new articalApi();
		return $api->remove($sid);
	}
	public function removeComment($sid){
		$api = new commentApi();
		return $api->remove($sid);
	}
}