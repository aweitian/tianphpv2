<?php
class treeControllerNotFoundModel extends AppModel {
	public $data;
	public $subid = 0;
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
		return treeUIApi::getInstance()->getInfo();
	}
	
	public function getRowByDiskey($urlkey) {
		return treeUIApi::getInstance()->getRowByDiskey($urlkey);
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
		return treeUIApi::getInstance()->getSydsBydid($did);
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
		return treeUIApi::getInstance()->getSiblingDids($did);
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
		if ($tid > 0)
			return articleUIApi::getInstance()->knowledge($did, $tid, $txtlength, $offset, $length);
		else
			return articleUIApi::getInstance()->allKnowledges($did, $txtlength, $offset, $length);
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
	
	public function getQuestionsByDidCnt($did){
		return askUIApi::getInstance()->getQuestionsByDidCnt($did);
	}
	public function getDisnameByDid($did){
		return treeUIApi::getInstance()->getNameByDid($did);
	}
	
	
	public function getDocRowByDod($dod){
		return doctorUIApi::getInstance()->getInfoByDod($dod);
	}
	
	public  function  getQuestionsCountByDod($dod){
	
		return askUIApi::getInstance()->getQuestionsCountByDod($dod);
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
	
	public function getLv1InfoesByDid($did){
		return treeUIApi::getInstance()->getLv1InfoesByDid($did);
	}
	
	public function row($uid){
		return userUIApi::getInstance()->row($uid);
	}
	public function getEssenceAidByDid($did, $length, $offset = 0){
		return articleUIApi::getInstance()->getEssenceAidByDid($did, $length, $offset);
	}
	
	public function knowledgeCnt($did, $tid) {
		
		if ($tid > 0)
				return articleUIApi::getInstance()->knowledgeCnt($did, $tid);
		else
		return articleUIApi::getInstance()->allKnowledgesCnt($did);
		
		
	
	}
	public function getTag($tid) {
		return tagsUIApi::getInstance()->getTag($tid);
	}
	
	public function getCountByAid($aid) {
		return commentUIApi::getInstance()->getCountByAid($aid);
	}
	
	/**
	 * 获取医生回答的个数
	 * @param int $askid
	 * @return int
	 */
	public function getAnswersDocReplyCnt($askid){
		return askUIApi::getInstance()->getAnswersDocReplyCnt($askid);
	}
	
	public function getDataCntByDod($dod){
		return letterUIApi::getInstance()->getDataCntByDod($dod);
	}
	public function getDataByDodCnt($dod){
		return presentApi::getInstance()->getDataByDodCnt($dod);
	}
	
	public function getAllCntdid($did) {
		return articleUIApi::getInstance()->getAllCnt($did);
	}

	
	
	
}