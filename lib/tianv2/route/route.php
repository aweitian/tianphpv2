<?php
/**
 * 引用了MESSAGE和route配置文件
 */

C::load(LIB_PATH.'/config/route.php');

abstract class route{
	/**
	 * 路径从入口开始算起
	 */
	const PATHINFO_KVP=0;
	const PATHINFO_NUM=1;
	
	protected function strip($path,$stripstart=ENTRY_HOME){
		if(substr($path, 0,strlen($stripstart))===$stripstart){
			return substr($path, strlen($stripstart));
		}
		return $path;
	}
	protected function getDefaultModel(){
		return C::get("route.defaultModel");
	}
	protected function getDefaultControl(){
		return C::get("route.defaultControl");
	}
	protected function getDefaultAction(){
		return C::get("route.defaultAction");
	}
}