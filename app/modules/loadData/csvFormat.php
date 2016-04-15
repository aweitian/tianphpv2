<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 */
class csvFormat{
	const CHANNEL_UNKNOWN = 0;
	const CHANNEL_BD = 1;
	const CHANNEL_SM = 2;
	const CHANNEL_SG = 3;
	const CHANNEL_360 = 4;
	
	const DEVICE_UNKNOWN = 0;
	const DEVICE_PC = 1;
	const DEVICE_MB = 2;
	
	private $ch;
	private $dv;
	
	public function __construct(){
		
	}
	public function parse($path){
		
		
		
		
		return array(
			"channel" => csvFormat::CHANNEL_UNKNOWN,
			"device"  => csvFormat::DEVICE_UNKNOWN
		);
	}
	
	/**
	 * 
	 * @param string $con
	 * @return bool
	 */
	private function isBd($path){
		//打开文件，读取文件头
		try{
			$handle = fopen($path, "r");
			#ini_set("auto_detect_line_endings", true);  //set for Macintosh 
			
			if ($handle) {
				$lineNo = 0;
				while (($line = fgets($handle)) !== false) {
					switch($lineNo){
						case 0:
							$l = iconv("GBK","utf-8",$line);
							
							
					}
					
				}
					
			}
		}catch(Exception $e){
			
		}finally{
			fclose($handle);
		}
		
		return false;
	}
	
}