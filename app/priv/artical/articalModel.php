<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/doctor/doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical/artical.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/disease/disease.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/symptom/symptom.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_disease/artical_disease.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_symptom/artical_symptom.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_doctor/artical_doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/artical_tags/artical_tags.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/tags/tags.api.php";

class articalModel extends privModel{
	public function __construct(){
		parent::__construct();
	}
	public function row($sid){
		$api = new articalApi();
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
	 * OK,RETURN is INSERT ID
	 * @param string $title
	 * @param string $content
	 * @param datetime $date
	 * @return rirResult
	 */
	public function add($title,$content,$date){
		$api = new articalApi();
		return $api->add($title, $content, $date);
	}
	
	public function update($sid,$title,$content,$date){
		$api = new articalApi();
		return $api->update($sid, $title, $content, $date);
	}
	
	public function remove($sid){
		$api = new articalApi();
		return $api->remove($sid);
	}
}