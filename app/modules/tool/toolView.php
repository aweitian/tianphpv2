<?php
/**
 * Date: 2015年12月31日
 * Author: Awei.tian
 * Description: 
 */
class toolView extends view{
	public function show(){
		$msg = file_get_contents("app/modules/tool/tpl/form.tpl.php");
		print $msg;
	}
}