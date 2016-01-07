<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */
class debug{
	private static $debugInfo = array();
	
	public static function d($msg){
		if(DEBUG_FLAG){
			debug::$debugInfo[] = $msg;
		}
	
	}
	public static function output(){
		foreach (debug::$debugInfo as $item){
			echo "<div style='background:#fff;border:0px solid #aaa;color:#333333;line-height:120%;'>".$item."</div>";
		}
	}
	public static function getDebugInfo(){
		return debug::$debugInfo;
	}
}