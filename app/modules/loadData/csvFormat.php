<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		CSV文件分为两种:PUBLIC && PRIVATE
 * 			
 */
abstract class csvFormat{
	/**
	 * 数据总行数
	 * @var int $cnt
	 */
	protected $cnt;
	/**
	 * csv文件路径
	 * @var string
	 */
	protected $path;
	
	const CSV_TYPE_PUB = 0;
	const CSV_TYPE_PRIV = 1;

	const BD_PUB_HEADER_ROWS = 8;
	const BD_PRIV_HEADER_ROWS = 1;
	
	/**
	 * @return bool;
	 */
	abstract public function check($lineNo,$content);
	
	/**
	 * @return CSV_TYPE_PUB/CSV_TYPE_PRIV
	 */
	abstract public function getCsvType();
	/**
	 * @return string
	 */
	abstract public function getChananel();
	/**
	 * @return array
	 */
	abstract public function getHeaderInfos();
	/**
	 * @return int
	 */
	abstract public function getHeaderRows();
	
	/**
	 * true为可以上传
	 * @param string $path
	 * @return bool
	 */
	protected function isUploaded($path){
		$fhash = md5_file($path);
		$pdo = new mysqlPdoBase();
		$data = $pdo->fetch("select * from `log_load_token` where
					`token` = :token order by sid desc limit 0,1
					", array(
									"token"  => $fhash,
							));
		return empty($data);
	}
	
	
	
// 	/**
// 	 * 
// 	 * @param unknown $path
// 	 * @return rirResult
// 	 */
// 	public function parse($path){
// 		$header = $this->isBd_Pub($path);
// 		$total = 0;
// 		if($header == 0){
// 			//把识别信息保存到数据库，用于确认
// 			$token = md5('shbdata'.$path.time());
			
			
// 			if(!empty($data)){
// 				$info = "你的文件数据可能在 [".$data["date"]."] 已经导入到数据库中，请确认.";
// 			}else{
// 				$info = "";
// 			}
// 			return new rirResult(0,$info,array(
// 					"channel" => "百度",
// 					"kind"    => self::CSV_KIND_PUB,
// 					"device"  => $this->dv,
// 					"total"   => $this->cnt,
// 					"token"   => $token,
// 					"path"    => $path
// 			)) ;
// 		}else{
// 			return new rirResult(2,"未识别的格式,Code".$header) ;
// 		}
// 	}
	
	
	
}