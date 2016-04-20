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
	/**
	 * 
	 * @var array $csv
	 */
	private $csv;
	/**
	 * 
	 * @var csvFormat $selectedCsv
	 */
	private $selectedCsv = null;
	
	
	private $max_header_rows = 0;
	public function __construct($path){
		$this->path = $path;
		$this->csv_dir = FILE_SYSTEM_ENTRY . "/app/modules/loadData/csv";
	}
	/**
	 * @return csvFormat
	 */
	public function getCsvFormat(){
		return $this->selectedCsv;
		
	}
	
	/**
	 * 扫描目录，初始化合法类
	 * @return bool
	 */
	public function search(){
		$this->csv = array();
		$files = tian::getALLFileList($this->csv_dir,"php");
		foreach ($files as $file){
			require $file;
			$cls = pathinfo($file,PATHINFO_FILENAME);
			if(!preg_match("/^\w+$/", $cls)){
				continue;
			}
			$rc = new ReflectionClass($cls);
			if(!$rc->isSubclassOf("csvFormat")){
				continue;
			}
			$ins = $rc->newInstanceArgs(array($this->path));
			$m = $rc->getMethod("getHeaderRows");
			$hr = $m->invoke($ins);
			if($hr > $this->max_header_rows){
				$this->max_header_rows = $hr;
			}
			$this->csv[] = $ins;
		}
		return !empty($csv);
	}
	/**
	 * 打开文件一行一行的读取
	 * @return bool
	 */
	public function match(){
// 		var_dump($this->max_header_rows);
		$path = $this->path;

		$lineNo = 0;

		$found = false;
		$handle = fopen($path, "r");
		#ini_set("auto_detect_line_endings", true);  //set for Macintosh

		if ($handle) {
			while (($line = fgets($handle)) !== false) {
// 				echo ":::",$lineNo;
				/**
				 * @var csvFormat $csv
				 */
				foreach ($this->csv as $csv){
					$csv->check($lineNo, $line);
					if($csv->isMatch()){
						$this->selectedCsv = $csv;
						$found = true;
						break;
					}
				}
				$lineNo++;
				if($lineNo > $this->max_header_rows){
					break;
				}
			}
			fclose($handle);
 		}
//		else
//		{
// 			exit("file not found");
// 		}
		if($found){
			$this->selectedCsv->setDataRows($lineNo - $this->selectedCsv->getHeaderRows());
			return true;
		}
		
		return false;
	}
	
	
	
}