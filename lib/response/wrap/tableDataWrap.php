<?php
/**
 * @author:awei.tian
 * @date:2013-12-24
 * @functions:
 */
require_once dirname(__FILE__)."/aWrap.php";
class tableDataWrap extends aWrap{
	/**
	 * 可设置属性
	 * caption
	 * @param unknown $options
	 */
	public $tpl;
	public function __construct($options=array()){
		$this->tpl=dirname(__FILE__)."/tpl/tableData/table.php";
	}
	/**
	 * $data : * caption,thead,tbody,* pagehtml
	 * 			tpl(tplfilepath)
	 * @see IWrap::wrap()
	 */
	public function wrap($data,httpResponse $response){
		if(isset($data["tpl"])){
			$this->tpl=$data["tpl"];
			unset($data["tpl"]);
		}
		return $this->fetch($data, $this->tpl);
	}
}