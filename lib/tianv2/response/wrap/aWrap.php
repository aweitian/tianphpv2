<?php
/**
 * @author:awei.tian
 * @date:2013-12-24
 * @functions:
 */
abstract class aWrap implements IWrap{
	public function fetch($vars,$tpl){
		if(!file_exists($tpl)){
			throw new Exception("Tpl path is illegal");
		}
		extract($vars);
		ob_start();
		require $tpl;
		$c=ob_get_contents();
		ob_end_clean();
		return $c;
	}
	public function display($vars,$tpl){
		if(!file_exists($tpl)){
			throw new Exception("Tpl path is illegal");
		}
		extract($vars);
		require $tpl;
	}
}