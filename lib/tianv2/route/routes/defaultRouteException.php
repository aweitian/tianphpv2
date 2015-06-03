<?php
/**
 * @author awei.tian
 * date: 2013-9-13
 * 说明:
 */
lang::import("defaultRouteException");
class defaultRouteException extends tianException{
	
	const INVALID_ARGS1=1;
	const INVALID_ARGS2=2;
	const INVALID_ARGS3=3;
	
	public function __construct($message = null, $code = 0){
		switch ($code){
			case self::INVALID_ARGS1:
				$this->message=lang::t("defaultRouteException.invalid_args1");
				break;
			case self::INVALID_ARGS2:
				$this->message=lang::t("defaultRouteException.invalid_args2");
				break;
			case self::INVALID_ARGS3:
				$this->message=lang::t("defaultRouteException.invalid_args3");
				break;

		}
	}
}