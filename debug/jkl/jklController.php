<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class jklController implements IController,IActionNotFound{
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $identityToken){
		return true;
	}
	
	public function _action_not_found(pmcaiMsg $msg){
		echo "hi";
	}
	public function welcomeAction(){
		echo "welcome from dbg/jkl";
	}
}