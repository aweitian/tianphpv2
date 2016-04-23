<?php
/**
 * Date: Apr 23, 2016
 * Author: Awei.tian
 * Description: 
 */
class loadDataFilter{
	public static function filterLink($v){
		return preg_replace("#^https?://#","",$v);
	}
	
	public static function filterChat($v){
		return $v === "" ? 0 : $v;
	}
	public static function filterSubscribe($v){
		return $v === "" ? 0 : $v;
	}
	public static function filterRcvpayment($v){
		return $v === "" ? 0 : $v;
	}
}