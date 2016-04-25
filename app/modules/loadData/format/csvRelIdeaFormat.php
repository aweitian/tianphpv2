<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		PUBLIC && PRIVATE && RELATIONSHIP
 * 		渠道,账户名,计划名称,单元名称,创意,创意PC参数,创意无线参数	
 */
abstract class csvRelIdeaFormat extends csvFormat{

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
	 * 创意TITLE
	 * @return string
	 */
	abstract public function getIdeaTitle($lineArr);

	/**
	 * 创意desc1
	 * @return string
	 */
	abstract public function getIdeaDesc1($lineArr);
	
	
	/**
	 * 创意desc2
	 * @return string
	 */
	abstract public function getIdeaDesc2($lineArr);
	
	
	
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
		return parent::TYPE_REL_IDEA;
	}
	public function getHeaderRows(){
		return 1;
	}
}