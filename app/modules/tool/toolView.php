<?php
/**
 * Date: 2015年12月31日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/AppView.php";
class toolView extends AppView{
	public function show(){
		$msg = file_get_contents("app/modules/tool/tpl/mvcForm.tpl.php");
		print $msg;
	}
	public function main(){
		$msg = file_get_contents("app/modules/tool/tpl/main.tpl.php");
		print $msg;
	}
	public function sql($tables,$sql="",$sql_var=""){
		$msg = $this->fetch("sqlForm",array(
			"table" => $tables,
			"sql" => $sql,
			"var" => $sql_var
		));
		print $msg;
	}
}