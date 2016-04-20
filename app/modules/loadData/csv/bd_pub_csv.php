<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
class bd_pub_csv extends csvFormat {
	private $dev;
	private $match_cnt = 0;
	public function __construct($path){
		$this->path = $path;
	}
	public function checkLine($lineNo, $line){
		switch($lineNo){
			case 0:
				$l = iconv("GBK","utf-8",$line);
				return utility::startsWith($l, "数据生成时间");
			case 1:
				$l = iconv("GBK","utf-8",$line);
				return utility::startsWith($l, "数据生成条件");
			case 2:
				$l = iconv("GBK","utf-8",$line);
				return utility::startsWith($l, "1. 时间范围");
			case 3:
				$l = iconv("GBK","utf-8",$line);
				return utility::startsWith($l, "2. 时间单位");
			case 4:
				$l = iconv("GBK","utf-8",$line);
				if(!utility::startsWith($l, "3. 推广设备：")){
					return false;
				}
				$tmp = explode("：", $l);
				$dev = trim($tmp[1]);
				if($dev == "计算机"){
					$this->dv = self::CSV_DEV_PC;
					return true;
				}else{
					$this->dv = self::CSV_DEV_PC;
					return true;
				}
			case 5:
			case 6:
				return true;
			case 7:
				$l = iconv("GBK","utf-8",$line);
				$l = trim($l);
				if($l != '日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,消费,点击率,平均点击价格,网页转化,商桥转化'){
					return false;
				}
				return true;
			default:
				return false;;
		}//end switch
	}
	public function getCsvType(){
		return parent::CSV_TYPE_PUB;
	}
	
	public function getChananel(){
		return "百度";
	}
	
	public function getHeaderInfos(){
		return array(
			"device"  => $this->dev,
		);
	}

	
	public function getHeaderRows(){
		return 8;
	}
}