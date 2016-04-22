<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		CSV文件分为两种:PUBLIC && PRIVATE
 * 			
 */
abstract class csvChannelFormat extends csvFormat{
	/**
	 * @return string
	 */
	abstract public function getChananel();
	
	/**
	 * @return ENUM
	 */
	abstract public function getDevType();
	
	
	public function getCsvType(){
		return parent::CSV_TYPE_PUB;
	}
}