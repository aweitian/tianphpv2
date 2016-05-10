<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 * 
 * 		这个类根据TAB缩进的文本格式来生成ARRAY(格式要求，同级必须对齐)
 * 		
 * 			$demo = new tabDataToArray(rawdata);
 * 			$demo->parse();//rirResult
 * 
 * 		根据TAB的个数确定DEPTH，
 * 			上升，DEPTH++,
 * 			下降，DEPTH--;
 * 			检查此DEPTH是否已存在，存在，看TABCOUNT是否相等，不等出错(同级必须对齐)
 */
class tabDataToArray{
	/**
	 * TAB个数对应DEPTH，在上升时建立
	 * @var ArrayAccess $tabHash
	 */
	private $tabHash = array();
	private $data;
	
	private $lastTabCount = -1;
	private $curTabCount;
	private $curDepth = -1;
	
	private $stack = array();
	public function __construct($data){
		$this->cleanData($data);
	}
	
	
	private function cleanData($data){
		$data = trim($data);
		$data = explode("\n", $data);
		foreach ($data as &$line){
			$line = rtrim(str_replace("\r", "", $line),"\t");
		}
		$this->data = $data;
	}
	/**
	 * forward stop backward
	 * 修改curDepth
	 * @return 1,0,-1;FALSE 不对齐
	 */
	private function fsb(){
		if($this->curTabCount > $this->lastTabCount){
			$this->curDepth++;
			$this->tabHash[$this->curDepth] = $this->curTabCount;
			$ret = 1;
		}else if($this->curTabCount == $this->lastTabCount){
			$ret = 0;
		}else{
			$this->curDepth--;
			$ret = -1;
		}
		
		//检查是否对齐
		if(array_key_exists($this->curDepth, $this->tabHash)){
			if($this->tabHash[$this->curDepth] != $this->curTabCount){
				return false;
			}
		}
		
		return $ret;
	}
	
	/**
	 * @return rirResult
	 * @param string $data
	 */
	public function parse(){
		$ret = array();
		
		foreach ($this->data as $line){
			$line = str_replace("\t","",$line,$to_depth);
			if($line == "")continue;
			$this->curTabCount = $to_depth;
			$fsb = $this->fsb();
			if(false === $fsb){
				return new rirResult(1,"数据不对齐:".$line);
			}
			if($fsb === 1){
				$this->stack[] = $line;
			}else if($fsb === 0){
				$this->stack[$this->curDepth] = $line;
			}else if($fsb === -1){
				while (count($this->stack) !== $this->curDepth){
					array_pop($this->stack);
				}
				$this->stack[$this->curDepth] = $line;
			}
			


			$tmp = & $ret;
			for($i=0;$i<$this->curDepth;$i++){
				$tmp = & $tmp[$this->stack[$i]];
			}
			$tmp[$line] = array();

	
			// 			var_dump($cur_depth,$cur_path);
			// 			$tmp[$line] = array();
			$this->lastTabCount = $to_depth;
		}
		return new rirResult(0,"ok",$ret);
	}
}