<?php
class diseaseControllerNotFoundModel extends AppModel {
	public $data;
	public function __construct() {
		
	}
	
	/**
	 * 返回类似下面的二维数组
	 * 
	 * pid  	pd		mid  	md       	url    
	 * ------  	------	------  --------	-------- 
	 * 322  	男性不育	327  	男性不育症		nxbyz
	 * 322  	男性不育	326  	肾虚           		sx 
	 */
	public function getDisease() {
		return diseaseUIApi::getInstance()->getInfo();
	}
	
	public function getRowByDiskey($urlkey) {
		return diseaseUIApi::getInstance()->getRowByDiskey($urlkey);
	}
	

	/**
	 * Author
	 * sihangzhang
	 */
	public function getRowThumbnail(){
		return articleUIApi::getInstance()->getRowThumbnail();
	}
	/**
	 * Author
	 * sihangzhang
	 */
	public function getNewest($length){
		return articleUIApi::getInstance()->getNewest($length);
	}
	/**
	 * Author
	 * sihangzhang
	 */
	public function getContent($aid,$len){
		$row = articleUIApi::getInstance()->row($aid,$len);
		if (empty($row)){
			return "";
		} else {
			return $row["content"];
		}
	}
	/**
	 * Author
	 * sihangzhang
	 */
	public function getSydsBydid($did){
		return diseaseUIApi::getInstance()->getSydsBydid($did);
	}
	/**
	 * Author
	 * sihangzhang
	 */
	
	public function getNameBySyd($syd){
		return symptomUIApi::getInstance()->getNameBySyd($syd);
	}
	/**
	 * Author
	 * sihangzhang
	 */
	
	public function getSiblingDids($did){
		return diseaseUIApi::getInstance()->getSiblingDids($did);
	}
	
	/**
	 * Author
	 * sihangzhang
	 */
	
	public function getArticleTag7ByDid($did, $length, $offset){
		return articleUIApi::getInstance()->getArticleTag7ByDid($did, $length, $offset);
	}
	
	/**
	 * Author
	 * sihangzhang
	 */
	
	public function getAll($did, $length, $offset = 0){
		return articleUIApi::getInstance()->getAll($did, $length, $offset);
	}
	
	/**
	 * Author
	 * sihangzhang
	 */
	public function getTopStar($length){
		return doctorUIApi::getInstance()->getTopStar($length);
	}
	
	/**
	 * Author
	 * sihangzhang
	 */
	public function knowledge($did, $tid, $txtlength, $offset, $length){
		return articleUIApi::getInstance()->knowledge($did, $tid, $txtlength, $offset, $length);
	}
	
	/**
	 * Author
	 * sihangzhang
	 */
	public function getTagId($text){
		return tagsUIApi::getInstance()->getTagId($text);
	}
	
	public function getQuestionsByDid($did,$length=4,$offset=0){
		return askUIApi::getInstance()->getQuestionsByDid($did,$length,$offset);
	}
	
	public function getDisnameByDid($did){
		return diseaseUIApi::getInstance()->getNameByDid($did);
	}
	
	
	public function getDocRowByDod($dod){
		return doctorUIApi::getInstance()->getInfoByDod($dod);
	}
	
	public function getAnswerByAskid($askid){
		return askUIApi::getInstance()->getAnswerByAskid($askid);
	}
	
	public function getOwner($aid){
			return articleUIApi::getInstance()->getFirstDod($aid);
	}
	public function getInfoByDod($dod){
		return doctorUIApi::getInstance()->getInfoByDod($dod);
	}
	/**
	 * Author
	 * sihangzhang
	 */
	public function getAllCnt($did){
		return doctorUIApi::getInstance()->getAllCnt($did);
	}
	public function getDoctors($length=4,$offset=0){
		return doctorUIApi::getInstance()->getInfoes($length,$offset);
	}
	
}