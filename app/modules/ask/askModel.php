<?php

class askModel extends AppModel {
	public $data = array( "sid"=> 0, "key"=> "all", "data" => "全部" );
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
	public function getLv0(){
		return diseaseUIApi::getInstance()->getLv0KeyInfoes();
	}
	
	
	/**
	 * Author
	 * sihangzhang
	 */
	public function getLv0Ask(){
		return diseaseUIApi::getInstance()->getLv0Infoes();
	}
	/**
	 * Author
	 * sihangzhang
	 */	
	public function getQuestionsByLv0Did($did,$length=8,$offset=0){
		return askUIApi::getInstance()->getQuestionsByLv0Did($did,$length,$offset);
	}
	public function getQuestionsCountByLv0Did($did){
		return askUIApi::getInstance()->getQuestionsCountByLv0Did($did);
	}
	

	/**
	 * Author
	 * sihangzhang
	 */
	public function getNameByDod($dod){
		return doctorUIApi::getInstance()->getNameByDod($dod);
	}
	/**
	 * Author
	 * sihangzhang
	 */
	public function getAllQuestions($off,$len){
		return askUIApi::getInstance()->getAllQuestions($off,$len);
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
}