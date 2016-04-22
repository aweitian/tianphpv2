<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
class priv_csv extends csvPrivFormat {
	private $dev;
	private $match_cnt = 0;
	
	public function __construct($path){
		$this->path = $path;
	}
	
	
	public function checkLine($lineNo, $line){
		switch($lineNo){
			case 0:
				$l = iconv("GBK","utf-8",$line);
				$l = trim($l);
				if($l != '日期,链接,参数,时间,备注,对话,预约,到诊,搜索词'){
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
	
	public function getHeaderRows(){
		return 1;
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