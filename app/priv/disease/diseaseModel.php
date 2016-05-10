<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
class diseaseModel extends privModel{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 
	 * @param array $data
	 * @return int rows
	 */
	public function import($data){
		echo "<pre>";
		$this->treeArrTra($data, array($this,"test"));
		echo "</pre>";
	}
	
	private function test($key,$arr,$depth,$index){
		print str_repeat("\t", $depth) . $key."\n";
	}
	
	/**
	 * 
	 * @param array $data
	 * @param callback $callback
	 */
	private function treeArrTra($data,$callback){
		//forest 遍历
		$i = 0;
		foreach ($data as $k => $v){
			$this->_helper_treeArrTra($callback,$k,$v,0,$i++);
		}
	}
	private function _helper_treeArrTra($callback,$key,$arr,$depth,$index){
		call_user_func_array($callback, array($key,$arr,$depth,$index));
		$i = 0;
		foreach ($arr as $k => $v){
			$this->_helper_treeArrTra($callback,$k,$v,$depth+1,$i++);
		}
	}
}