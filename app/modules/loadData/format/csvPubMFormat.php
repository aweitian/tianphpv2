<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		PUBLIC && PRIVATE && RELATIONSHIP
 * 			
 */
abstract class csvPubMFormat extends csvFormat{
	/**
	 * @return string
	 */
	abstract public function getChannel();
	
	/**
	 * @return string
	 */
	abstract public function getAcc($lineArr);
	
	
	/**
	 * @return string
	 */
	abstract public function getPlan($lineArr);
	/**
	 * @return string
	 */
	abstract public function getUnit($lineArr);
	/**
	 * @return int
	 */
	abstract public function getTitle($lineArr);
	/**
	 * @return string
	 */
	abstract public function getDes1($lineArr);
	/**
	 * @return string
	 */
	abstract public function getDes2($lineArr);
	/**
	 * @return string
	 */
	abstract public function getUrl($lineArr);
	/**
	 * @return string
	 */
	abstract public function getShow($lineArr);
	/**
	 * @return string
	 */
	abstract public function getClks($lineArr);
	/**
	 * @return string
	 */
	abstract public function getPays($lineArr);
	/**
	 * @return string
	 */
	abstract public function getDate($lineArr);
	/**
	 * @return string
	 */
	abstract public function getHour($line);
	public function getCsvType(){
		return parent::TYPE_PUB_M;
	}
}