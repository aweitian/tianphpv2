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
	
	
	
	private $match_mask = 0;
	
	const CSV_TYPE_PUB = 0;
	const CSV_TYPE_PRIV = 1;

	const BD_PUB_HEADER_ROWS = 8;
	const BD_PRIV_HEADER_ROWS = 1;
	
	
	const CSV_DEV_M = "m";
	const CSV_DEV_PC = "pc";
	const CSV_DEV_PRIV  = "pr";
	/**
	 * @return bool;
	 */
	abstract protected function checkLine($lineNo,$content);
	
	
	/**
	 * @return string
	 */
	abstract public function getDisplayName();
	
	/**
	 * @return CSV_TYPE_PUB/CSV_TYPE_PRIV
	 */
	abstract public function getCsvType();
	
	
	/**
	 * @return int
	 */
	abstract public function getHeaderRows();
	
	/**
	 * @return bool
	 */
	public function isMatch(){
		return $this->match_mask == (1 << $this->getHeaderRows()) - 1;
	}
	
	public function check($lineNo,$content){
		if($this->checkLine($lineNo,$content)){
			$this->match_mask = $this->match_mask | (1 << $lineNo);
		}
	}
	/**
	 * @return int
	 */
	public function getDataRows(){
		return $this->cnt;
	}
	public function setDataRows($lines){
		$this->cnt = $lines;
	}
	/**
	 * true为可以上传
	 * @param string $path
	 * @return array row
	 */
	public function isUploaded($path){
		$fhash = md5_file($path);
		$pdo = new mysqlPdoBase();
		$data = $pdo->fetch(sqlManager::getInstance("data")->getSql("/sql/log_load_token/getRowByToken"), array(
			"token"  => $fhash,
		));
		return $data;
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