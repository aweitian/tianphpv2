<?php
/**
 * @data 2016-7-7
 * @author awei.tian
 * @descript
 * 		模板数据
 */
class defTplData{
	private static $inst;
	const TYPE_STATIC_HTML   = 0;
	const TYPE_INCLUDE_NOW   = 1;
	const TYPE_INCLUDE_DELAY = 2;
	public $title;
	public $description;
	public $keyword;
	private $tpl = array();
	private $html = array();
	private $layout;
	private function __construct(){
		$this->init();
	}
	/**
	 * @return defTplData
	 */
	public static function getInstance(){
		if(is_null(defTplData::$inst)){
			defTplData::$inst = new defTplData();
		}
		return defTplData::$inst;
	}
	/**
	 * 直接设置CONTENT
	 * @param string $type (defTplData::TYPE_INCLUDE_NOW/TYPE_INCLUDE_DELAY/TYPE_STATIC_HTML)
	 * @param string $data(一维的) 如果是前两个类型，DATA的元素为两个，第一个为TPL文件路径，两个为数组，进行EXTRACT
	 * @return defTplData
	 */
	public function push($type,$data){
		switch ($type){
			case defTplData::TYPE_INCLUDE_NOW:
				if(is_array($data) && count($data) == 2 && is_string($data[0]) && is_array($data[1])){
					$this->fetch($data[0], $data[1]);
				}else{
					throw new Exception("invalid data",0x1);
				}
				break;
			case defTplData::TYPE_INCLUDE_DELAY:
				if(is_array($data) && count($data) == 2 && is_string($data[0]) && is_array($data[1])){
					$this->feed($data[0], $data[1]);
				}else{
					throw new Exception("invalid data",0x1);
				}
				break;
			default:
				$this->html = array(0,$data);
				break;
		}
		return $this;
	}
	/**
	 * 立即INCLUDE
	 * @param string $tpl tpl file path
	 * @param array $data 环境数据
	 * @return defTplData
	 */
	private function fetch($tpl,$data){
		ob_start();
		extract($data);
		include $tpl;
		$this->html[] = array(0,ob_get_contents());
		ob_end_clean();
		return $this;
	}
	/**
	 * 按从上到下正常顺序INCLUDE
	 * @param string $tpl tpl文件路径 
	 * @param unknown $data  tpl文件数据环境
	 */
	private function feed($tpl,$data){
		$this->html[] = array(1,array($tpl,$data));
		return $this;
	}
	
	public function setLayout($layout=""){
		if($layout != ""){
			$this->layout = $layout;
		}else{
			$this->layout = FILE_SYSTEM_ENTRY."/template/default/layout.php";
		}
		return $this;
	}
	public function reponse(){
		include $this->layout;
	}
	public function outputContent(){
		foreach ($this->html as $tpl){
			if($tpl[0] == 0){
				print $tpl[1];
			}else{
				extract($tpl[1][1]);
				include $tpl[1][0];
			}
		}
	}
	private function init(){
		$this->title = "shjl";
		$this->keyword = "man nk";
		$this->description = "hook";
	}
}