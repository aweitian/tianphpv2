<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
class bd_pub_csv extends csvFormat {
	
	
	public function getHeaderRows(){
		return 8;
	}
	
	
	/**
	 * 初始化 dv,cnt
	 * @param string $con
	 * @return int 0 ok
	 */
	public function isBd_Pub($path){
		//打开文件，读取文件头
	
		try{
			$handle = fopen($path, "r");
			#ini_set("auto_detect_line_endings", true);  //set for Macintosh
				
			if ($handle) {
				$lineNo = 0;
				while (($line = fgets($handle)) !== false) {
					if($lineNo < self::BD_PUB_HEADER_ROWS){
						switch($lineNo){
							case 0:
								$l = iconv("GBK","utf-8",$line);
								if(!utility::startsWith($l, "数据生成时间")){
									return 1;
								}
								break;
							case 1:
								$l = iconv("GBK","utf-8",$line);
								if(!utility::startsWith($l, "数据生成条件")){
									return 2;
								}
								break;
							case 2:
								$l = iconv("GBK","utf-8",$line);
								if(!utility::startsWith($l, "1. 时间范围")){
									return 3;
								}
								break;
							case 3:
								$l = iconv("GBK","utf-8",$line);
								if(!utility::startsWith($l, "2. 时间单位")){
									return 4;
								}
								break;
							case 4:
								$l = iconv("GBK","utf-8",$line);
								if(!utility::startsWith($l, "3. 推广设备：")){
									return 5;
								}
								$tmp = explode("：", $l);
								$dev = trim($tmp[1]);
								if($dev == "计算机"){
									$this->dv = self::DEV_PC;
									break;
								}else if($dev == "移动设备"){
									$this->dv = self::DEV_MOBILE;
									break;
								}else{
									return 6;
								}
								break;
							case 5:
							case 6:
								break;
							case 7:
								$l = iconv("GBK","utf-8",$line);
								$l = trim($l);
								if($l != '日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,消费,点击率,平均点击价格,网页转化,商桥转化'){
									return 7;
								}
							default:
								break;
						}//end switch
					}//end if
						
					$lineNo++;
				}
				fclose($handle);
			}
		}catch(Exception $e){
				
		}
		$this->cnt = $lineNo - self::BD_PUB_HEADER_ROWS;
		return 0;
	
	}
}