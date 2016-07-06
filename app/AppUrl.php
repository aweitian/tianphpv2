<?php
class AppUrl {
#医生评价
	/**
	 * @return string
	 */
	public static function appraisePut(){
		return AppUrl::build("/appraise");
	}
#感谢信PUT
	/**
	 * @return string
	 */
	public static function letterPut(){
		return AppUrl::build("/letter");
	}	
	
	
#问答URl生成
	/**
	 * @param string $docid
	 * @param int $asd  askid
	 * @return string
	 */
	public static function askByAsdDocidAsd($docid,$asd){
		return AppUrl::build("/".$docid."/ask?id=".$asd);
	}
	/**
	 * @param int $dod
	 * @param int $asd  askid
	 * @return string
	 */
	public static function askByAsdDocid($dod,$asd){
		$row = doctorUIApi::getInstance()->getInfoByDod($dod);
		if(empty($row)){
			return AppUrl::_404();
		}
		return AppUrl::build("/".$row["id"]."/ask?id=".$asd);
	}
	
	
	
#医生URL生成	
	
	/**
	 * 根据医生ID(NAME那个)生成医生首页的URL
	 * @param string $diskey
	 * @return string
	 */
	public static function docHomeByDocid($docid){
		return AppUrl::build("/".$docid);
	}
	/**
	 * 根据医生ID生成医生首页的URL
	 * @param int $dod
	 * @return string
	 */
	public static function docHomeByDod($dod){
		$row = doctorUIApi::getInstance()->getInfoByDod($dod);
		if(empty($row)){
			return AppUrl::_404();
		}
		return AppUrl::docHomeByDocid($row["id"]);
	}
	
	/**
	 * 生成医生感谢信URl
	 * @param string $docid
	 * @param int $led
	 * @return string
	 */
	public static function docLetterByDocidLed($docid,$led){
		return AppUrl::build("/".$docid."/letter?id=".$led);
	}
	/**
	 * 生成医生感谢信URl
	 * @param int $led
	 * @return string
	 */
	public static function docLetterByDodLed($dod,$led){
		$row = doctorUIApi::getInstance()->getInfoByDod($dod);
		if(empty($row)){
			return AppUrl::_404();
		}
		return AppUrl::docLetterByDocidLed($row["id"],$led);
	}
	
#疾病URL生成	
	/**
	 * 根据病种KEY生成URL
	 * @param string $diskey
	 * @return string
	 */
	public static function disHomeByDiseasekey($diskey){
		return AppUrl::build("/disease/".$diskey);
	}
	/**
	 * 根据病种ID生成URL
	 * @param int $did
	 * @return string
	 */
	public static function disHomeByDid($did){
		$row = diseaseUIApi::getInstance()->getRowByDid($did);
		if(empty($row)){
			return AppUrl::_404();
		}
		return AppUrl::build("/disease/".$row["key"]);
	}
	
	
	
	
	
	
#文章URL生成	
	/**
	 * 获取症状的URL
	 * @param int $syd
	 * @return string
	 */
	public static function articleBySyd($syd){
		$aid = articleUIApi::getInstance()->getFirstAidBySyd($syd);
		if ($aid == 0){
			return AppUrl::_404();
		}else{
			return AppUrl::articleByAid($aid);
		}
	}	
	/**
	 * 
	 * @param int $aid
	 * @return string
	 */
	public static function articleByAid($aid){
		$dod = articleUIApi::getInstance()->getFirstDod($aid);
		if ($dod == 0) {
			return AppUrl::_404();
		}else{
			return AppUrl::articleByDodAid($dod,$aid);
		}
	}
	
	/**
	 * 根据医生ID和文章ID生成URL
	 * @param int $dod
	 * @param int $aid
	 * @return string
	 */
	public static function articleByDodAid($dod,$aid){
		$row = doctorUIApi::getInstance()->getInfoByDod($dod);
		if(empty($row)){
			return AppUrl::_404();
		}
		return AppUrl::articleByDocidAid($row["id"],$aid);
	}
	
	/**
	 * 优先使用这个函数获取
	 * @param string $doc_id
	 * @param int $aid
	 * @return string
	 */
	public static function articleByDocidAid($doc_id,$aid){
		return AppUrl::build("/".$doc_id."/article?id=".$aid);
	}
	
	
	
	
	
	
	
#基本URL生成
	
	/**
	 * 基本URL生成
	 * @param string $path
	 * @return string
	 */
	public static function build($path){
		return HTTP_ENTRY.$path;
	}
	/**
	 * 获取商务通URL
	 * @return string
	 */
	public static function getSwtUrl(){
		return "/swt";
	}
	/**
	 * 404路径
	 * @return string
	 */
	public static function _404(){
		return HTTP_ENTRY."/404";
	}
}