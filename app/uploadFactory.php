<?php
/**
 * @date: 2016-6-17
 * @author:awei.tian
 * @desc:
 * 
 */

 
class uploadFactory {
	private static $_inst;
	/**
	 * 
	 * @return IUpload
	 */
	public static function getInstance($scenario="default"){
		if(is_null(self::$_inst)){
			switch ($scenario){
				
				
				
				default:
					require_once FILE_SYSTEM_ENTRY."/modules/upload/uploadCommon.php";
					$u = new uploadCommon();
					$u->init();
					self::$_inst = $u;	
					break;				
			}
			

		}
		return self::$_inst;
	}
}



