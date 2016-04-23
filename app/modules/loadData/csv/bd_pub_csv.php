<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
class bd_pub_csv extends csvChannelFormat {
	private $dev;
	private $match_cnt = 0;
	public function __construct($path){
		$this->path = $path;
	}
	public function getDisplayName(){
		return "百度".($this->dev == csvFormat::CSV_DEV_PC ? "计算机" : "移动")."数据";
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
					$this->dev = self::CSV_DEV_PC;
					return true;
				}else{
					$this->dev = self::CSV_DEV_M;
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
	
	
	public function getChannel(){
		return "百度";
	}
	
	public function getDevType(){
		return $this->dev;
	}

	
	public function getHeaderRows(){
		return 8;
	}
// 	$offset_acc  = 2;
// 	$offset_plan = 3;
// 	$offset_unit = 4;
// 	$offset_titl = 5;
// 	$offset_des1 = 6;
// 	$offset_des2 = 7;
// 	$offset_url  = 8;
// 	$offset_show = 9;
// 	$offset_clks = 10;
// 	$offset_pays = 11;
	/**
	 * @return string
	 */
	public function getAcc($lineArr){
		return $lineArr[2];
	}
	
	
	/**
	 * @return string
	 */
	public function getPlan($lineArr){
		return $lineArr[3];
	}
	/**
	 * @return string
	 */
	public function getUnit($lineArr){
		return $lineArr[4];
	}
	/**
	 * @return int
	 */
	public function getTitle($lineArr){
		return $lineArr[5];
	}
	/**
	 * @return string
	 */
	public function getDes1($lineArr){
		return $lineArr[6];
	}
	/**
	 * @return string
	 */
	public function getDes2($lineArr){
		return $lineArr[7];
	}
	/**
	 * @return string
	 */
	public function getUrl($lineArr){
		return $lineArr[8];
	}
	/**
	 * @return string
	 */
	public function getShow($lineArr){
		return $lineArr[9];
	}
	/**
	 * @return string
	 */
	public function getClks($lineArr){
		return $lineArr[0xa];
	}
	/**
	 * @return string
	 */
	public function getPays($lineArr){
		return $lineArr[0xb];
	}
	
	/**
	 * @return string
	 */
	public function getDate($lineArr){
		return $lineArr[0] . " " . $lineArr[1] . ":00:00";
	}
}