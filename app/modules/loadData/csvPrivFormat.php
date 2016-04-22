<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		CSV文件分为两种:PUBLIC && PRIVATE
 * 			
 */
abstract class csvPrivFormat extends csvFormat{
	public function getCsvType(){
		return parent::CSV_TYPE_PRIV;
	}
}