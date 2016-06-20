<?php
/**
 * 
 * @author awei.tian
 * @date   2015/6/18
 * windows/linux:根目录的上级还是根目录
 * 		   打开一个路径失败，还保持原来的路径
 * 		 这里不处理像 ///home ../dad//dekd/ed//dd连接出现两个//的路径
 */
abstract class filePath{
	public $errMsg;
	public $errCode;
	protected $cur;
	/**
	 * 
	 * @param string $cur 当前目录绝对路径
	 */
	public function __construct($cur){
		if(!$this->isAbsolutePath($cur)){
			throw new Exception("only absolute path accepted.",0x8812);
		}
		$this->cur = $this->linuxPath($cur);
	}
	/**
	 * 
	 * @return bool
	 * @param string $filename
	 */
	abstract public function exists($filename);
	/**
	 * 
	 * @return true
	 * 进入父目录
	 */
	public function up(){
		if($this->isRoot())return true;
		$cur = dirname($this->cur);
		if($cur == DIRECTORY_SEPARATOR){
			$cur = '/';
		}
		$this->cur = $cur;
		return true;
	}
	/**
	 * 
	 * @param string $filename
	 * @return boolean
	 */
	public function open($filename){
		if($filename == ".")return true;
		if($filename == ".."){
			$this->up();
			return true;
		}
		if(!$this->isValidFilename($filename)){
			$this->errCode = 0x8811;
			$this->errMsg = "invalid filename";
			return false;
		}
		if($this->exists($filename)){
			if($this->isRoot()){
				$this->cur = '/' . $filename;
			}else{
				$this->cur = $this->cur . '/' . $filename;
			}
			return true;
		}
		return false;
	}
	/**
	 * 
	 * @param string $path
	 * @return boolean
	 */
	public function entry($path){
		$bak = $this->cur;
		$this->linuxPath($path);
		if($path !== '/'){
			$path = rtrim($path,'/');
		}else{
			$this->cur = '/';
			return true;
		}
		if($this->isAbsolutePath($path)){
			$this->cur = '/';
			$path = substr($path, 1);
		}
		$pathArr = explode('/', $path);
		foreach ($pathArr as $item){
			if(!$this->open($item)){
				return false;
			}
		}
		return true;
	}
	/**
	 * 
	 * @return boolean
	 */
	public function isRoot(){
		return $this->cur == DIRECTORY_SEPARATOR;
	}
	/**
	 * 
	 * @param string $filename
	 * @return boolean
	 */
	public function isValidFilename($filename){
		return $filename != "" && strpos($filename, '/') === false;
	}
	/**
	 *
	 * @param string $filename
	 * @return boolean
	 */
	public function isAbsolutePath($path){
		return $path[0] === '/';
	}
	/**
	 *
	 * @param string $filename
	 * @return string
	 */
	public function linuxPath($path){
		return str_replace('\\','/',$path);
	}
	/**
	 * @return string
	 */
	public function getPath(){
		return $this->cur;
	}
}