<?php
class diseaseModel extends AppModel {
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
	
	public function getLv0Infoes() {
		return diseaseUIApi::getInstance()->getLv0Infoes();
	}
	
	public function getLv1InfoesByDid($did) {
		return diseaseUIApi::getInstance()->getLv1InfoesByDid($did);
	}
	
	
	
	/**
	 * 根据病种ID获取疾病知识的文章
	 * 最多只返回一篇
	 * sid  thumb                              title   desc    
	 * 30  /uploads/user/201606211043371.png  tald    sdalfkwe
	 * @param int $did
	 * @return array fetch
	 */
	public function getArticleTag7ByDid($did){
		return diseaseUIApi::getInstance()->getArticleTag7ByDid($did);
	}
	
	public function getTopStar($length){
		return doctorUIApi::getInstance()->getTopStar($length);
	}
	
	
	public function allDataByLv0did($lv0did,$length,$offset=0) {
		return articleUIApi::getInstance()->allDataByLv0did($lv0did,$length,$offset);
	}
	public function rowNoContent($aid) {
		$ret = articleUIApi::getInstance()->rowNoContent($aid);
		return $ret;
	}
	
		public function getAllQuestions($off,$len){
		return askUIApi::getInstance()->getAllQuestions($off,$len);
	}
	
	
	public function getInfoByDod($dod){
		return doctorUIApi::getInstance()->getInfoByDod($dod);
	}
	
	public function getAnswerByAskid($askid) {
		return askUIApi::getInstance ()->getAnswerByAskid ( $askid );
	}
	public function getAllQuestionsCnt() {
		return askUIApi::getInstance ()->getAllQuestionsCnt (  );
	}
	
	
	
	
}