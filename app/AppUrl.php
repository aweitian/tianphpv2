<?php
class AppUrl {
#全局URL
	public static function navHome(){
		return AppUrl::build("/");
	}	
	

	
	
#文章URL生成	
	
	/**
	 * 文章页URL
	 * @param int $aid
	 * @return string
	 */
	public static function articleHosipitalByAid($aid){
		return AppUrl::build("/hosipital/$aid.html");
	}
	/**
	 * 文章列表表URL
	 * @param int $aid
	 * @return string
	 */
	public static function articleHosipitalListByPage($page){
		return AppUrl::build("/hosipital/index_$page.html");
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
		return "/swt";
	}
	/**
	 * 404路径
	 * @return string
	 */
	public static function _404(){
		return HTTP_ENTRY."/404";
	}
}