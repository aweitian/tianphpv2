<?php
/**
 * @author: awei.tian
 * @date: 2013-11-9
 * @function:
 */
class mysqlTableInfoException extends tianException  {
	const CACHE_HAVE_TO_IMPLEMENT_ICACHE=0;
	const ERROR=1;
	
	public function __construct($message = null, $code = 0){
		switch ($code){
			case self::CACHE_HAVE_TO_IMPLEMENT_ICACHE:
				$this->message=lang::t("mysqlTableInfoException.cache_have_to_implement_icache");
				break;
			case self::ERROR:
				$this->message=lang::t("mysqlTableInfoException.error");
				break;


		}
	}
}