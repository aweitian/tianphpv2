<?php
class diseaseControllerNotFoundModel extends AppModel {
	public $data;
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
		return diseaseUIApi::getInstance()->getSydsBydid($did);
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

	
}