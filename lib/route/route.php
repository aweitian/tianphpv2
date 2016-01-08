<?php
/**
 * 引用了MESSAGE和route配置文件
 */

require_once 'lib/interfaces/route/IRoute.php';
abstract class route implements IRoute{
	/**
	 * 路径从入口开始算起
	 */
	const PATHINFO_KVP=0;
	const PATHINFO_NUM=1;
	
	protected function strip($path,$stripstart=HTTP_ENTRY){
		if(substr($path, 0,strlen($stripstart))===$stripstart){
			return substr($path, strlen($stripstart));
		}
		return $path;
	}
}