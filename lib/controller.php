<?php
/**
 * Date: 2016年1月8日
 * Author: Awei.tian
 * Description: 
 */
class Controller implements IController{
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $identityToken){
		return true;
	}
}