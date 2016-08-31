<?php
/**
 * Date: 2016年1月7日
 * Author: Awei.tian
 * Description: 
 */
class View{
	protected $html;
	public function wrap($content,$tpl = '/template/layout.php'){
		ob_start();
		include $tpl;
		$this->html = ob_get_contents();
		ob_end_clean();
		return $this;
	}
	public function show(){
		print $this->html;
		exit;
	}
	public function utf8Header(){
		return '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
	}
}