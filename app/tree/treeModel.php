<?php
class treeControllerNotFoundModel extends AppModel {
	public $data;
	public $channel = 0;
	public $aid = 0;
	public function __construct() {
		
	}
	


	public function getArticleRow($aid){
		return articleUIApi::getInstance()->rowNoContent($aid);
	}

	public function getContent($aid,$len){
		return articleUIApi::getInstance()->row($aid,$len);
	}
	
	
	public function getInfoes($length,$offset=0){
		return doctorUIApi::getInstance()->getInfoes($length,$offset=0);
	}
	public function getAllQuestions($offset,$length){
		return askUIApi::getInstance()->getAllQuestions($offset,$length);
	}
	
	
	public function getAnswerByAskid($askid){
		return askUIApi::getInstance()->getAnswerByAskid($askid);
	}
	
	public function getRow(){
		return treeUIApi::getInstance()->getData($this->channel);
	}
	public function getAidArrByTrd($trd,$length,$offset=0){
		return treeUIApi::getInstance()->getAidArrByTrd($trd,$length,$offset);
	}
	
	public function getAidArrByTrdCnt($trd){
		return treeUIApi::getInstance()->getAidArrByTrdCnt($trd);
	}
	public function row($aid, $textlength){
		return articleUIApi::getInstance()->row($aid, $textlength);
	}
	
	public function rowNoContent($aid) {
		return articleUIApi::getInstance ()->rowNoContent ( $aid );
	}
	
	public function data($aid, $offset, $length) {
		return commentUIApi::getInstance ()->data ( $aid, $offset, $length );
	}
	
	
	
	
}