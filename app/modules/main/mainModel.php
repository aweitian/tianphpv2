<?php
require_once FILE_SYSTEM_ENTRY."/app/data/_meta/appraiseLvMeta.php";
class mainModel extends AppModel {
	
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
	
	public function getDoctors($length=4){
		return doctorUIApi::getInstance()->getInfoes($length);
	}
	
	/**
	 * 根据医生ID获取一个问答
	 * @param int $dod
	 * @param int $length
	 * @return array
	 */
	public function getAskQuestionByDod($dod){
		$data = askUIApi::getInstance()->getQuestionsByDod($dod,1);
		if(count($data) == 1){
			return $data[0];
		}else{
			return array();
		}
	}
	
	
	public function getLv0Ask(){
		return diseaseUIApi::getInstance()->getLv0Infoes();
	}
	
	public function getQuestionsByLv0Did($did,$length=8){
		return askUIApi::getInstance()->getQuestionsByLv0Did($did,$length);
	}
	
	/**
	 * Author
	 * sihangzhang
	 */
	public function getAllQuestions($off,$len){
		return askUIApi::getInstance()->getAllQuestions($off,$len);
	}
	
	public function getNameByDod($dod){
		return doctorUIApi::getInstance()->getNameByDod($dod);
	}
	
	public function getAppraise($length){
		return appraiseUIApi::getInstance()->getData($length);
	}
	public function getNameByDid($did){
		return diseaseUIApi::getInstance()->getNameByDid($did);
	}
	public function getNameByUid($uid){
		return userUIApi::getInstance()->getNameByUid($uid);
	}
	public function getAppMeta($i){
		$m = appraiseLvMeta::getMeta();
		return $m[$i];
	}
	public function getLetterCnt(){
		return letterUIApi::getInstance()->cnt();
	}
	public function getLetter($length){
		return letterUIApi::getInstance()->data($length);
	}
	public function getNewest($length){
		return articleUIApi::getInstance()->getNewest($length);
	}
	public function getLv0Data(){
		return symptomUIApi::getInstance()->alllv0();
	}
    public function alllv1BySyd($syd){
		return symptomUIApi::getInstance()->alllv1BySyd($syd);
	}
	public function getData($length,$offset=0){
		return presentUIApi::getInstance()->getData($length,$offset);
	}
	public function rowpid($pid) {
		return presentUIApi::getInstance ()->row($pid);
	}
	
	public function getInfoByDod($dod){
		return doctorUIApi::getInstance()->getInfoByDod($dod);
	}
	
	
	
	
	
	
	
	public function getAllComment($length,$offset=0){
		return commentUIApi::getInstance()->all($offset,$length);
	}
	public function getArticleRowByAid($aid){
		return articleUIApi::getInstance()->rowNoContent($aid);
	}
	public function getFirstDocByAid($aid){
		return articleUIApi::getInstance()->getFirstDod($aid);
	}
	public function getUserRowByUid($uid){
		return userUIApi::getInstance()->row($uid);
	}
}