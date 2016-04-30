<?php
/**
 * Date: Apr 30, 2016
 * Author: Awei.tian
 * Description: 
 */
class qArgs{

	const LVL_ALL = 0;
	const LVL_CHANNEL = 1;
	const LVL_ACCOUNT = 2;
	const LVL_PLAN = 3;
	const LVL_UNIT = 4;
	
	const DEV_ALL = 0;
	const DEV_PC = 1;
	const DEV_M = 2;
	
	private $span_valid;
	private $span;
	private $lvl_meta;
	private $lvl_data;
	private $dev;
	private $gi;
	/**
	 * 构造函数
	 */
	public function __construct(){
		$this->lvl_meta = self::LVL_ALL;
		$this->lvl_data = 0;
		$this->dev = self::DEV_ALL;
		$this->gi = true;
		$this->span_valid = false;
		$this->span = array();
	}
	/**
	 * 
	 * @param int $l
	 * @param array $p
	 * @return bool
	 */
	public function setLevel($l,$p){
		switch($l){
			case self::LVL_ALL:
			case self::LVL_CHANNEL:
			case self::LVL_ACCOUNT:
			case self::LVL_PLAN:
			case self::LVL_UNIT:
				if(validator::isUint($p)){
					$this->lvl_data = $p;
					$this->lvl_meta = $l;
					return true;
				}
				break;
		}
		return false;
	}
	/**
	 * 
	 * @param int $d
	 * @return bool
	 */
	public function setDev($d){
		switch($d){
			case self::DEV_ALL:
			case self::DEV_PC:
			case self::DEV_M:
				$this->dev = $d;
				return true;
		}
		return false;;
	}
	
	/**
	 * 
	 * @param bool $g
	 * @return bool
	 */
	public function setGrpIdea($g){
		if(is_bool($g)){
			$this->gi = $g;
			return true;
		}
		return false;
	}
	
	/**
	 * 
	 * @param string $span 空，DATE-DATA，DATETIME-DATETIME
	 * @return bool
	 */
	public function setDatespan($span){
		$valid = $span != "";
		if($valid){
			if(strpos($span, " - ") !== false){
				$span = explode(" - ", $span);
			}else{
				$span = array($span);
			}
			if(count($span) == 1){
				if(validator::isDate($span[0])){
					$this->span_valid = true;
					$this->span = array($span[0] . " 00:00:00",$span[0] . "23:59:59");
					return true;
				}
			}else if(count($span) == 2){
				if(validator::isDate($span[0])){
					$span[0] = $span[0] . " 00:00:00";
				}
				if(validator::isDate($span[1])){
					$span[1] = $span[1] . " 23:59:59";
				}
				if(validator::isDateTime($span[0]) && validator::isDateTime($span[1])){
					$this->span_valid = true;
					$this->span = $span;
					return true;
				}
			}
			return false;
		}
		$this->span_valid = false;
		$this->span = array();
		return true;
	}
	
	
	public function getLevel(){
		return $this->level_meta;
	}
	public function getLevelDatas(){
		return $this->lvl_data;
	}
	public function getDev(){
		return $this->dev;
	}
	public function getGrpIdea(){
		return $this->gi;
	}
	public function getSpanValid(){
		return $this->span_valid;
	}
	public function getSpan(){
		return $this->span;
	}
}