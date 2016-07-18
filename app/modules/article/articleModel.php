<?php
class articleModel extends AppModel {
	
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
	/**
	 * Sihangzhang
	 */
	public function getDoctors($length=4){
		return doctorUIApi::getInstance()->getInfoes($length);
	}
	/**
	 * Sihangzhang
	 */
	public function getAnswerByAskid($askid){
		return askUIApi::getInstance()->getAnswerByAskid($askid);
	}
	/**
	 * Sihangzhang
	 */
	public function getAllQuestions($offset,$length){
		return askUIApi::getInstance()->getAllQuestions($offset,$length);
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
}