<?php
/**
 * Date: 2016-05-12
 * Author: Sihangzhang
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/user/user.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/doctor/doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/article/article.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/disease/disease.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/symptom/symptom.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/article_disease/article_disease.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/article_symptom/article_symptom.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/article_doctor/article_doctor.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/article_tags/article_tags.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/tree/tree.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/tags/tags.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/comment/comment.api.php";
require_once FILE_SYSTEM_ENTRY."/app/data/priv/doctor_lv/doctor_lv.api.php";

class articleModel extends privModel{
	public $msg;
	public function __construct(){
		parent::__construct();
	}
	public function dump(){
		$api = new treeApi();
		return $api->dump();
	}
	public function row($sid){
		$api = new articleApi();
		return $api->row($sid);
	}
	public function row_comment($sid){
		$api = new commentApi();
		return $api->row($sid);
	}
	public function getCacheDoctor(){
		$api = new doctorLvApi();
		return $api->getLvInfo();
	}
	public function getCacheDisease(){
		$api = new diseaseApi();
		return $api->getInfo();
	}
	
	public function hasArticleBysyd($syd){
		$api = new articleSymptomApi();
		$ret = $api->row($syd);
		return !empty($ret);
	}
	
	/**
	 * @return rirResult
	 */
	public function allCnt(){
		$api = new articleDiseaseApi();
		$ret =  $api->allCnt();
		if($ret->isTrue()){
			return $ret->return;
		}
		return 0;
	}
	/**
	 * @return rirResult
	 */
	public function allCntByDid($did){
		$api = new articleDiseaseApi();
		$ret =  $api->allCntByDid($did);
		if($ret->isTrue()){
			return $ret->return;
		}
		return 0;
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
// 		var_dump($api->getInfo());exit;
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
		$api = new articleSymptomApi();
		return $api->connect($idArr, $syd);
	}
	
	public function con_reldis($idArr,$dd){
		if(!is_array($dd)){
			$dd = array($dd);
		}
		$api = new articleDiseaseApi();
		return $api->connect($idArr, $dd);
	}
	public function con_reldoc($idArr,$dd){
		if(!is_array($dd)){
			$dd = array($dd);
		}
		$api = new articleDoctorApi();
		return $api->connect($idArr, $dd);
	}
	
	public function assignRand(){
		$api = new articleDoctorApi();
		return $api->assignRand();
	}
	
	public function q_reldoc_aid($aid){
		$api = new articleDoctorApi();
		return $api->row($aid);
	}
	public function q_reldis_aid($aid){
		$api = new articleDiseaseApi();
		return $api->row($aid);
	}
	public function q_relsym_aid($aid){
		$api = new articleSymptomApi();
		return $api->all($aid);
	}
	public function q_tags_aid($aid){
		$api = new articleTagsApi();
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
		$api = new articleDoctorApi();
		return $api->allNotRel($offset, $len);
	}
	public function q_reldis($offset,$len){
		$api = new articleDiseaseApi();
		return $api->allNotRel($offset, $len);
	}
	public function q_revreldis($dcid,$diid,$q,$offset,$len){
		$api = new articleDiseaseApi();
		return $api->query($dcid, $diid, $q, $offset, $len);
	}
	public function q_revreldoc($doid,$q,$offset,$len){
		$api = new articleDoctorApi();
		return $api->query($doid, $q, $offset, $len);
	}
	
	public function updateTags($aid,$tidArr){
		$api = new articleTagsApi();
		return $api->update($aid, $tidArr);
	}
	
	public function disconRelDis($aid,$did){
		$api = new articleDiseaseApi();
		return $api->disconnect($aid, $did);
	}
	public function disconRelDoc($aid,$dod){
		$api = new articleDoctorApi();
		return $api->disconnect($aid, $dod);
	}
	
	public function q($q,$offset,$len){
		$api = new articleApi();
		return $api->query($q, $offset, $len);
	}
	
	public function getList($offset=0,$len=10){
		$api = new articleApi();
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
	
	public function verifyComment($sid){
		$api = new commentApi();
		return $api->verify($sid);
	}
	
	/**
	 * OK,RETURN is INSERT ID
	 * @param string $title
	 * @param string $content
	 * @param datetime $date
	 * @return rirResult
	 */
	public function add($kw,$desc,$thumb,$title,$content,$date){
		$api = new articleApi();
		return $api->add($kw,$desc,$thumb,$title,$content, $date);
	}
	
	public function update($sid,$kw,$desc,$thumb,$title,$content,$date){
		$api = new articleApi();
		return $api->update($sid,$kw,$desc,$thumb,$title,$content,$date);
	}
	public function updateComment($sid,$uid,$comment,$datetime){
		$api = new commentApi();
		return $api->updatePriv($sid, $uid, $comment, $datetime);
	}
	
	public function remove($sid){
		$api = new articleApi();
		return $api->remove($sid);
	}
	public function removeComment($sid){
		$api = new commentApi();
		return $api->remove($sid);
	}
}