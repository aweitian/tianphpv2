<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
abstract class abs_bd_pub_csv extends csvPubFormat {
	protected $offset = array();
	
	public function __construct($path){
		$this->path = $path;
	}
	
	public function parseOffset($rea_arr){
		$this->offset = array();
		$col_arr = explode(",", '日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,消费');
		$len = count($rea_arr);
		if($len<12)return false;
		for($i=0;$i<$len;$i++){
			for($j=0;$j<12;$j++){
				if($col_arr[$j] == $rea_arr[$i]){
					$this->offset[$j] = $i;
					break;
				}
			}
		}
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
				//override
				return false;
			case 5:
			case 6:
				return true;
			case 7:
				//2016-5-6修改只能找到所需的列就可以
				$l = iconv("GBK","utf-8",$line);
				$l = trim($l);
				$rea_arr = explode(",",$l);
				$this->parseOffset($rea_arr);
				return count($this->offset) == 12;
			default:
				return false;;
		}//end switch
	}
	
	
	public function getChannel(){
		return iconv("utf8", "gbk", "百度") ;
	}
	
	public function getHeaderRows(){
		return 8;
	}
// 	日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,消费
	/**
	 * @return string
	 */
	public function getAcc($lineArr){
		return $lineArr[$this->offset[2]];
	}
	
	
	/**
	 * @return string
	 */
	public function getPlan($lineArr){
		return $lineArr[$this->offset[3]];
	}
	/**
	 * @return string
	 */
	public function getUnit($lineArr){
		return $lineArr[$this->offset[4]];
	}
	/**
	 * @return int
	 */
	public function getTitle($lineArr){
		return $lineArr[$this->offset[5]];
	}
	/**
	 * @return string
	 */
	public function getDes1($lineArr){
		return $lineArr[$this->offset[6]];
	}
	/**
	 * @return string
	 */
	public function getDes2($lineArr){
		return $lineArr[$this->offset[7]];
	}
	/**
	 * @return string
	 */
	public function getUrl($lineArr){
		return $lineArr[$this->offset[8]];
	}
	/**
	 * @return string
	 */
	public function getShow($lineArr){
		return $lineArr[$this->offset[9]];
	}
	/**
	 * @return string
	 */
	public function getClks($lineArr){
		return $lineArr[$this->offset[0xa]];
	}
	/**
	 * @return string
	 */
	public function getPays($lineArr){
		return $lineArr[$this->offset[0xb]];
	}
	
	/**
	 * @return string
	 */
	public function getDate($lineArr){
		return $lineArr[$this->offset[0x0]];
	}
	/**
	 * @return string
	 */
	public function getHour($lineArr){
		return $lineArr[$this->offset[0x1]];
	}
}