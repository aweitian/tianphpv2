<?php
/**
 * Date: Apr 15, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		PUBLIC && PRIVATE && RELACTIONSHIP
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
	
	const TYPE_UNK = 0;
	const TYPE_PUB_M = 1;
	const TYPE_PUB_PC = 2;
	const TYPE_PRI = 3;
	const TYPE_REL_IDEA = 4;
	const TYPE_REL_UNIT = 5;
	
	/**
	 * @return bool;
	 */
	abstract protected function checkLine($lineNo,$content);
	
	
	/**
	 * @return string
	 */
	abstract public function getDisplayName();
	
	/**
	 * @return CSV_TYPE
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
	public function getPath(){
		return $this->path;
	}
}