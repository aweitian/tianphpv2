<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		CSV文件分为三种:PUBLIC && PRIVATE && RELATIONSHIP
 * 			
 */
abstract class csvPrivFormat extends csvFormat{
	
	/**
	 * @return string
	 */
	abstract public function getCode($line);
	
	/**
	 * @return string
	 */
	abstract public function getChat($line);
	
	/**
	 * @return string
	 */
	abstract public function getSubscribe($line);
	
	/**
	 * @return string
	 */
	abstract public function getRcvpayment($line);
	
	
	/**
	 * @return string
	 */
	abstract public function getLink($line);
	
	/**
	 * @return string
	 */
	abstract public function getKw($line);	
	
	
	/**
	 * @return string
	 */
	abstract public function getMark($line);
	

	/**
	 * @return string
	 */
	abstract public function getDate($line);	
	
	
	
	public function getCsvType(){
		return parent::TYPE_PRI;
	}
	public function getHeaderRows(){
		return 1;
	}
}