<?php
/**
 * Date:2015年6月3日
 * Author:Awei.tian
 * Function:
 */
function strip($path,$stripstart="/aa/bb"){
	if(substr($path, 0,strlen($stripstart))===$stripstart){
		return substr($path, strlen($stripstart));
	}
	return $path;
}
echo strip("/aa/bb/cc");

