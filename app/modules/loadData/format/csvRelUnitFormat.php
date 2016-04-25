<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		PUBLIC && PRIVATE && RELATIONSHIP
 * 		渠道,账户名,计划名称,单元名称,单元PC参数,单元无线参数	
 */
abstract class csvRelUnitFormat extends csvFormat{
	
	/**
	 * 渠道
	 * @return string
	 */
	abstract public function getChananel($line);
	
	/**
	 * 账户名
	 * @return string
	 */
	abstract public function getAcc($line);

	/**
	 * 计划名称
	 * @return string
	 */
	abstract public function getPlan($lineArr);
	/**
	 * 单元名称
	 * @return string
	 */
	abstract public function getUnit($lineArr);
	/**
	 * 单元PC参数
	 * @return string
	 */
	abstract public function getPcCode($lineArr);	
	/**
	 * 单元无线参数
	 * @return string
	 */
	abstract public function getMCode($lineArr);
	
	
	public function getCsvType(){
		return parent::TYPE_REL_UNIT;
	}
	public function getHeaderRows(){
		return 1;
	}
}