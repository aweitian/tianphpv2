<?php
require_once FILE_SYSTEM_ENTRY."/app/data/_meta/appraiseLvMeta.php";
class hospitalModel extends AppModel {
	
	public function __construct() {
		
	}
	
	
	public function getUserRowByUid($uid){
		return userUIApi::getInstance()->row($uid);
	}
	
	public function getLetterCnt(){
		return letterUIApi::getInstance()->cnt();
	}
	public function getDisease() {
		return diseaseUIApi::getInstance()->getInfo();
	}
	public function getDoctors($length=4){
		return doctorUIApi::getInstance()->getInfoes($length);
	}
	
	
	public function getLv0Infoes() {
		return diseaseUIApi::getInstance()->getLv0Infoes();
	}
	
	public function getLv1InfoesByDid($did) {
		return diseaseUIApi::getInstance()->getLv1InfoesByDid($did);
	}
	
	
	public function getRandomDid($length) {
		return diseaseUIApi::getInstance ()->getRandomDid ( $length );
	}
	public function getData($length,$offset=0){
		return presentUIApi::getInstance()->getData($length,$offset);
	}
	public function getNameByUid($uid){
		return userUIApi::getInstance()->getNameByUid($uid);
	}
	public function rowpid($pid) {
		return presentUIApi::getInstance ()->row($pid);
	}
	
	public function getInfoByDod($dod){
		return doctorUIApi::getInstance()->getInfoByDod($dod);
	}
	
	public function getTopStar($length){
		return doctorUIApi::getInstance()->getTopStar($length);
	}
	
	public function getDodDataByDid($did) {
		return diseaseUIApi::getInstance()->getDodDataByDid($did);
	}
	
	public function getDidDataByDod($dod) {
		return doctorApi::getInstance()->getDidDataByDod($dod);
	}

	
	public function getAllQuestionsCnt(){
		return askUIApi::getInstance()->getAllQuestionsCnt();
	}
	public function getAllCnt(){
		return doctorUIApi::getInstance()->getAllCnt();
	}
	public function getAllQuestions($off,$len){
		return askUIApi::getInstance()->getAllQuestions($off,$len);
	}
	public function getNameByDod($dod){
		return doctorUIApi::getInstance()->getNameByDod($dod);
	}
	public function allThumbnail($length, $offset){
		return articleUIApi::getInstance()->allThumbnail($length, $offset);
	}
	public function getFirstDod($aid){
		return articleUIApi::getInstance()->getFirstDod($aid);
	}
	
	
	
}