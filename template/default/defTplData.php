<?php
/**
 * @data 2016-7-7
 * @author awei.tian
 * @descript
 * 		模板数据
 */
class defTplData{
	private static $inst;
	public $title;
	public $description;
	public $keyword;
	private $tpl = array();
	private $html = array();
	private $raw = "";
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
	 * @param string $html
	 * @return defTplData
	 */
	public function raw($html){
		$this->raw = $html;
		return $this;
	}
	/**
	 * 立即INCLUDE
	 * @param string $tpl tpl file path
	 * @param array $data 环境数据
	 * @return defTplData
	 */
	public function fetch($tpl,$data){
		ob_start();
		extract($data);
		include $tpl;
		$this->html[] = ob_get_contents();
		ob_end_clean();
		return $this;
	}
	/**
	 * 按从上到下正常顺序INCLUDE
	 * @param string $tpl tpl文件路径 
	 * @param unknown $data  tpl文件数据环境
	 */
	public function feed($tpl,$data){
		$this->tpl[] = array($tpl,$data);
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
		print $this->raw;
		foreach ($this->html as $tpl){
			print $tpl;
		}
		foreach ($this->tpl as $tpl){
			extract($tpl[1]);
			include $tpl[0];
		}
	}
	private function init(){
		$this->title = "shjl";
		$this->keyword = "man nk";
		$this->description = "hook";
	}
}