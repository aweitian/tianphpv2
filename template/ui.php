<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
abstract class ui{
	protected $args;
	abstract public function getHTML();
	public function getArgs($data){
		return $this->args;
	}
	public function setArgs($data){
		$this->args = $data;
	}
	public function fetch($tpl,$data=array()){
		ob_start();
		extract($data);
		include $tpl;
		$ret = ob_get_contents();
		ob_end_clean();
		return $ret;
	}
}