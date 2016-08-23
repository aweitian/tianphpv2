<?php
require_once FILE_SYSTEM_ENTRY . "/app/data/default/doctor.uiapi.php";
class doctorsModelControllerNotFound extends AppModel {
	public $data;
	public function __construct() {
	}
	
	/**
	 * 根据医生ID获取一个文章
	 * 
	 * @param int $dod        	
	 * @param int $length        	
	 * @return array
	 */
	public function row($aid) {
		return articleUIApi::getInstance ()->row ( $aid, 0 );
	}
	public function rowNoContent($aid) {
		return articleUIApi::getInstance ()->rowNoContent ( $aid );
	}
	public function allByDod($dod, $length, $offset = 0) {
		return articleUIApi::getInstance ()->allByDod ( $dod, $length, $offset );
	}
	public function getOwner($aid) {
		return articleUIApi::getInstance ()->getFirstDod ( $aid );
	}
	public function getPresentDataByDod($dod, $length, $offset = 0) {
		return presentUIApi::getInstance ()->getDataByDod ( $dod, $length, $offset );
	}
	public function getDataByDod($dod, $length, $offset = 0) {
		return appraiseUIApi::getInstance ()->getDataByDod ( $dod, $length, $offset );
	}
	public function getEssenceAidByDid($did, $length, $offset = 0) {
		return articleUIApi::getInstance ()->getEssenceAidByDid ( $did, $length, $offset );
	}
	public function getAll($did, $length, $offset = 0) {
		return articleUIApi::getInstance ()->getAll ( $did, $length, $offset );
	}
	public function getNameByDid($did) {
		return diseaseUIApi::getInstance ()->getNameByDid ( $did );
	}
	public function getSiblingDids($did) {
		return diseaseUIApi::getInstance ()->getSiblingDids ( $did );
	}
	public function getDataByDodCnt($dod) {
		return appraiseUIApi::getInstance ()->getDataByDodCnt ( $dod );
	}
	public function getPresentDataByDodCnt($dod){
		return presentUIApi::getInstance ()->getDataByDodCnt ( $dod );
	}
	public function getQuestionsCountByDod($dod){
		return askUIApi::getInstance ()->getQuestionsCountByDod ( $dod );
	}
	public function rowuser($uid) {
		return userUIApi::getInstance ()->row ( $uid );
	}
	public function getQuestionsByDod($dod, $length = 5, $offset = 0) {
		return askUIApi::getInstance ()->getQuestionsByDod ( $dod, $length, $offset );
	}
	public function getAnswerByAskid($askid) {
		return askUIApi::getInstance ()->getAnswerByAskid ( $askid );
	}
	public function getDocRowByDod($dod) {
		return doctorUIApi::getInstance ()->getInfoByDod ( $dod );
	}
	public function getNameByDod($dod) {
		return doctorUIApi::getInstance ()->getNameByDod ( $dod );
	}
	public function allByDodCnt($dod) {
		return articleUIApi::getInstance ()->allByDodCnt ( $dod );
	}
	public function getQuestionsByDid($did, $length = 4, $offset = 0) {
		return askUIApi::getInstance ()->getQuestionsByDid ( $did, $length, $offset );
	}
	public function getRandomDid($length) {
		return diseaseUIApi::getInstance ()->getRandomDid ( $length );
	}
	public function getNameByUid($uid) {
		return userUIApi::getInstance ()->getNameByUid ( $uid );
	}
	public function getAnswersCnt($askid) {
		return askUIApi::getInstance ()->getAnswersCnt ( $askid );
	}
	public function getAnswersDocReplyCnt($askid) {
		return askUIApi::getInstance ()->getAnswersDocReplyCnt ( $askid );
	}
	public function getRowThumbnail() {
		return articleUIApi::getInstance ()->getRowThumbnail ();
	}
	public function getNewest($length) {
		return articleUIApi::getInstance ()->getNewest ( $length );
	}
	public function getContent($aid, $len) {
		$row = articleUIApi::getInstance ()->row ( $aid, $len );
		if (empty ( $row )) {
			return "";
		} else {
			return $row ["content"];
		}
	}
	public function getAnswers($askid, $length, $offset = 0) {
		return askUIApi::getInstance ()->getAnswers ( $askid, $length, $offset );
	}
	public function getQuestionByAskid($askid) {
		return askUIApi::getInstance ()->getQuestionByAskid ( $askid );
	}
	public function data($aid, $offset, $length) {
		return commentUIApi::getInstance ()->data ( $aid, $offset, $length );
	}
	public function getAllQuestionsCnt() {
		return askUIApi::getInstance ()->getAllQuestionsCnt ();
	}
	public function getAppraise($length) {
		return appraiseUIApi::getInstance ()->getData ( $length );
	}
	public function getAppMeta($i) {
		$m = appraiseLvMeta::getMeta ();
		return $m [$i];
	}
	public function getLetter($length) {
		return letterUIApi::getInstance ()->data ( $length );
	}
	public function getLetterByDod($dod, $length, $offset = 0) {
		return letterUIApi::getInstance ()->getDataByDod ( $dod, $length, $offset );
	}
	public function getLetterCnt() {
		return letterUIApi::getInstance ()->cnt ();
	}
	public function getDataCntByDod($dod) {
		return letterUIApi::getInstance ()->getDataCntByDod($dod);
	}
	/**
	 * 根据文章查找病种，返回一个病种的ID,文章不属于任何病种的时候返回0
	 *
	 * @param int $aid        	
	 * @return number
	 */
	public function getFirstDid($aid) {
		return articleUIApi::getInstance ()->getFirstDid ( $aid );
	}
	public function all() {
		return presentUIApi::getInstance ()->all ();
	}
	public function getDataCnt() {
		return presentUIApi::getInstance ()->getDataCnt ();
	}
	
	public function rowpid($pid) {
		return presentUIApi::getInstance ()->row($pid);
	}
	public function getRowByDid($did) {
		return diseaseUIApi::getInstance ()->getRowByDid($did);
	}
	
}