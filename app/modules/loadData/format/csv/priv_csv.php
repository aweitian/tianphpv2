<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
class priv_csv extends csvPrivFormat {
	public function __construct($path){
		$this->path = $path;
	}
	
	
	public function checkLine($lineNo, $line){
		switch($lineNo){
			case 0:
				$l = iconv("GBK","utf-8",$line);
				$l = trim($l);
				if($l != '渠道,账户,日期,链接,参数,时间,备注,对话,预约,到诊,搜索词'){
					return false;
				}
				return true;
			default:
				return false;
		}
	}
	
	public function getDisplayName(){
		return "私有数据";
	}
	

	/**
	 * @return string
	 */
	public function getChannel($line){
		return $line[0];
	}
	/**
	 * @return string
	 */
	public function getAccount($line){
		return $line[1];
	}
	/**
	 * @return string
	 */
	public function getCode($line){
		return $line[2+2];
	}
	
	/**
	 * @return string
	 */
	public function getChat($line){
		return $line[5+2];
	}
	
	/**
	 * @return string
	 */
	public function getSubscribe($line){
		return $line[6+2];
	}
	
	/**
	 * @return string
	 */
	public function getRcvpayment($line){
		return $line[7+2];
	}
	
	
	/**
	 * @return string
	 */
	public function getLink($line){
		return $line[1+2];
	}
	
	/**
	 * @return string
	 */
	public function getKw($line){
		return $line[8+2];
	}
	
	
	/**
	 * @return string
	 */
	public function getMark($line){
		return $line[4+2];
	}
	
	
	/**
	 * @return string
	 */
	public function getDate($line){
		$md = iconv("GBK", "UTF8", $line[0+2]);
		$md = str_replace("月", "-", $md);
		$md = str_replace("日", "", $md);
		return date("Y",time()) . "-" . $md;
	}
	/**
	 * @return string
	 */
	public function getHour($line){
		$ti = $line[3+2];
		return $ti;
	}
	
// 	/**
// 	 * 初始化 cnt
// 	 * @param string $con
// 	 * @return int 0 ok
// 	 */
// 	public function isBd_Priv($path){
// 		//打开文件，读取文件头
	
// 		$lineNo = 0;
// 		try{
// 			$handle = fopen($path, "r");
// 			#ini_set("auto_detect_line_endings", true);  //set for Macintosh
				
// 			if ($handle) {
				
// 				while (($line = fgets($handle)) !== false) {
// 					switch($lineNo){
// 						case 0:
// 							$l = iconv("GBK","utf-8",$line);
// 							$l = trim($l);
// 							if($l != '日期,链接,参数,时间,备注,对话,预约,到诊,搜索词'){
// 								return 1;
// 							}
// 							break;
// 						default:
// 							break;
// 					}//end switch
// 					$lineNo++;
// 				}
// 				fclose($handle);
// 			}
// 		}catch(Exception $e){
				
// 		}
// 		$this->cnt = $lineNo - self::BD_PRIV_HEADER_ROWS;
// 		return 0;
	
// 	}
}