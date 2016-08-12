<?php
require_once FILE_SYSTEM_ENTRY."/app/data/default/doctor.uiapi.php";
class doctorsModelControllerNotFound extends AppModel {
	public $data;
	public function __construct() {
		
	}
	
	/**
	 * 根据医生ID获取一个文章
	 * @param int $dod
	 * @param int $length
	 * @return array
	 */
	public function row($aid){
		return articleUIApi::getInstance()->row($aid, 0);
	}
	public function rowNoContent($aid){
		return articleUIApi::getInstance()->rowNoContent($aid, 0);
	}
	public function allByDod($dod,$length,$offset=0){
		return articleUIApi::getInstance()->allByDod($dod,$length,$offset);
	}
	
	
	public function getDataByDod($dod,$length,$offset=0){
		return appraiseUIApi::getInstance()->getDataByDod($dod,$length,$offset);
	}
	
	public function getNameByDid($did){
		return diseaseUIApi::getInstance()->getNameByDid($did);
	}
	public function getDataByDodCnt($dod){
		return appraiseUIApi::getInstance()->getDataByDodCnt($dod);
	}
	
	public function rowuser($uid){
		return userUIApi::getInstance()->row($uid);
	}
	
	
	public function getQuestionsByDod($dod,$length=5,$offset=0){
		return askUIApi::getInstance()->getQuestionsByDod($dod,$length,$offset);
	}
	

	public function getAnswerByAskid($askid){
		return askUIApi::getInstance()->getAnswerByAskid($askid);
	}
	
	public function getDocRowByDod($dod){
		return doctorUIApi::getInstance()->getInfoByDod($dod);
	}
	public function allByDodCnt($dod){
		return articleUIApi::getInstance()->allByDodCnt($dod);
	}
	
	public  function  getRandomDid($length){
		
		return diseaseUIApi::getInstance()->getRandomDid($length);
	}
	public  function  getNameByUid($uid){
	
		return userUIApi::getInstance()->getNameByUid($uid);
	}
	
	public  function  getQuestionsCountByDod($dod){
	
		return askUIApi::getInstance()->getQuestionsCountByDod($dod);
	}
	
	public  function  getAnswersCnt($askid){
	
		return askUIApi::getInstance()->getAnswersCnt($askid);
	}
	
	public  function  getAnswersDocReplyCnt($askid){
	
		return askUIApi::getInstance()->getAnswersDocReplyCnt($askid);
	}
	
	public function getRowThumbnail(){
		return articleUIApi::getInstance()->getRowThumbnail();
	}
	public function getNewest($length){
		return articleUIApi::getInstance()->getNewest($length);
	}
	public function getContent($aid,$len){
		$row = articleUIApi::getInstance()->row($aid,$len);
		if (empty($row)){
			return "";
		} else {
			return $row["content"];
		}
	}

	public  function  getAnswers($askid,$length,$offset=0){
	
		return askUIApi::getInstance()->getAnswers($askid,$length,$offset);
	}
	public  function  getQuestionByAskid($askid){
	
		return askUIApi::getInstance()->getQuestionByAskid($askid);
	}

	public  function  data($aid,$offset,$length){
	
		return commentUIApi::getInstance()->data($aid,$offset,$length);
	}
	public  function  getAllQuestionsCnt(){
	
		return askUIApi::getInstance()->getAllQuestionsCnt();
	}
	
	public function getAppraise($length){
		return appraiseUIApi::getInstance()->getData($length);
	}
	
	public function getAppMeta($i){
		$m = appraiseLvMeta::getMeta();
		return $m[$i];
	}
	public function getLetter($length){
		return letterUIApi::getInstance()->data($length);
	}
	public function getLetterCnt(){
		return letterUIApi::getInstance()->cnt();
	}
}