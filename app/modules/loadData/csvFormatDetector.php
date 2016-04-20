<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description:
 * 
 *  	循环遍历CSV目录
 *  	打开文件，一行一行读取
 */
class csvFormatDetector{
	/**
	 * csv file path
	 * @var string 
	 */
	private $path;
	
	private $csv_dir;
	public function __construct($path){
		$this->path = $path;
		$this->csv_dir = FILE_SYSTEM_ENTRY . "/app/modules/loadData/csv";
	}
	/**
	 * @return bool
	 */
	public function search(){
		$csv = array();
		$files = tian::getALLFileList($this->csv_dir,"php");
		foreach ($files as $file){
			require $file;
			$cls = pathinfo($file,PATHINFO_FILENAME);
			$rc = new ReflectionClass($cls);
			
			
			
		}
		
	}
}