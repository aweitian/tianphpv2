<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		渠道,账户名,计划名称,单元名称,单元PC参数,单元无线参数	
 */
class rel_unit_csv extends csvRelUnitFormat {
	public function __construct($path){
		$this->path = $path;
	}
	
	public function checkLine($lineNo, $line){
		switch($lineNo){
			case 0:
				$l = iconv("GBK","utf-8",$line);
				$l = trim($l);
				if($l != '渠道,账户名,计划名称,单元名称,单元PC参数,单元无线参数'){
					return false;
				}
				return true;
			default:
				return false;
		}
	}
	
	public function getDisplayName(){
		return "单元参数(代码)格式";
	}
	

	/**
	 * @return string
	 */
	public function getChananel($line){
		return $line[0];
	}
	/**
	 * @return string
	 */
	public function getAcc($line){
		return $line[1];
	}
	/**
	 * @return string
	 */
	public function getPlan($line){
		return $line[2];
	}
	
	/**
	 * @return string
	 */
	public function getUnit($line){
		return $line[3];
	}

	
	
	/**
	 * @return string
	 */
	public function getPcCode($line){
		return $line[4];
	}
	
	
	/**
	 * @return string
	 */
	public function getMCode($line){
		return $line[5];
	}
}