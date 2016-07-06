<?php
class AppUrl {
	
	
#医生URL生成	
	
	/**
	 * 根据医生ID(NAME那个)生成医生首页的URL
	 * @param string $diskey
	 * @return string
	 */
	public static function getDocHomeByDocid($docid){
		return AppUrl::build("/".$docid);
	}
	/**
	 * 根据医生ID生成医生首页的URL
	 * @param int $dod
	 * @return string
	 */
	public static function getDocHomeByDod($dod){
		$row = doctorUIApi::getInstance()->getInfoByDod($dod);
		if(empty($row)){
			return AppUrl::_404();
		}
		return AppUrl::getDocHomeByDocid($row["id"]);
	}
	
	
#疾病URL生成	
	/**
	 * 根据病种KEY生成URL
	 * @param string $diskey
	 * @return string
	 */
	public static function getUrlByDiseasekey($diskey){
		return AppUrl::build("/disease/".$diskey);
	}
	
	
	
	
	
	
#文章URL生成	
	/**
	 * 获取症状的URL
	 * @param int $syd
	 * @return string
	 */
	public static function getSymptomUrlBySyd($syd){
		$aid = articleUIApi::getInstance()->getFirstAidBySyd($syd);
		if ($aid == 0){
			return AppUrl::_404();
		}else{
			return AppUrl::getArticleUrlByAid($aid);
		}
	}	
	/**
	 * 
	 * @param int $aid
	 * @return string
	 */
	public static function getArticleUrlByAid($aid){
		$dod = articleUIApi::getInstance()->getFirstDod($aid);
		if ($dod == 0) {
			return AppUrl::_404();
		}else{
			return AppUrl::getUrlByDodAid($dod,$aid);
		}
	}
	
	/**
	 * 根据医生ID和文章ID生成URL
	 * @param int $dod
	 * @param int $aid
	 * @return string
	 */
	public static function getUrlByDodAid($dod,$aid){
		$row = doctorUIApi::getInstance()->getInfoByDod($dod);
		if(empty($row)){
			return AppUrl::_404();
		}
		return AppUrl::getUrlByDocidAid($row["id"],$aid);
	}
	
	/**
	 * 优先使用这个函数获取
	 * @param string $doc_id
	 * @param int $aid
	 * @return string
	 */
	public static function getUrlByDocidAid($doc_id,$aid){
		return AppUrl::build("/".$doc_id."/article?id=".$aid);
	}
	
	
	
	
	
	
	
#基本URL生成
	
	/**
	 * 基本URL生成
	 * @param string $path
	 * @return string
	 */
	public static function build($path){
		return HTTP_ENTRY.$path;
	}
	/**
	 * 获取商务通URL
	 * @return string
	 */
	public static function getSwtUrl(){
		return "";
	}
	/**
	 * 404路径
	 * @return string
	 */
	public static function _404(){
		return HTTP_ENTRY."/404";
	}
}