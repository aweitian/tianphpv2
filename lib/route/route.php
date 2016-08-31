<?php
/**
 * 引用了MESSAGE和route配置文件
 */

require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IRoute.php';
abstract class route implements IRoute{
	/**
	 * 路径从入口开始算起
	 */
	const PATHINFO_KVP=0;
	const PATHINFO_NUM=1;
	
	/**
	 * 如果存在，以/开头   /aa/bb/cc   /aa/bb 返回/cc
	 * @param string $path
	 * @param string $stripstart
	 * @return string|unknown
	 */
	protected function strip($path,$stripstart=HTTP_ENTRY){
		if(substr($path, 0,strlen($stripstart))===$stripstart){
			return substr($path, strlen($stripstart));
		}
		return $path;
	}
}