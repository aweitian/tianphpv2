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
	public static function getInstance(){
		if(is_null(self::$_inst)){
			require_once FILE_SYSTEM_ENTRY."/modules/upload/uploadCommon.php";
			self::$_inst = new uploadCommon();
		}
		return self::$_inst;
	}
}



