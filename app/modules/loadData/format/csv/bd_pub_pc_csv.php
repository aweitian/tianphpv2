<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
require_once dirname(__FILE__)."/abs_bd_pub_csv.php";
class bd_pub_pc_csv extends abs_bd_pub_csv{
	public function getDisplayName(){
		return "百度计算机数据";
	}
	public function checkLine($lineNo, $line){
		switch($lineNo){
			case 4:
				$l = iconv("GBK","utf-8",$line);
				if(!utility::startsWith($l, "3. 推广设备：")){
					return false;
				}
				$tmp = explode("：", $l);
				$dev = trim($tmp[1]);
				$dev = str_replace(",","",$dev);
				if($dev == "计算机"){
					return true;
				}
				return false;
	
			default:
				return parent::checkLine($lineNo, $line);
		}//end switch
	}
	public function getCsvType(){
		return csvFormat::TYPE_PUB_PC;
	}
}