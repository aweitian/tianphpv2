<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:
 */
class mysqlColumnInfoException extends tianException  {
	const CACHE_HAVE_TO_IMPLEMENT_ICACHE=0;
	
	public function __construct($message = null, $code = 0){
		switch ($code){
			case self::CACHE_HAVE_TO_IMPLEMENT_ICACHE:
				$this->message=lang::t("mysqlColumnInfoException.cache_have_to_implement_icache");
				break;


		}
	}
}