<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 * 		Specail for pmcai view
 */
require_once FILE_SYSTEM_ENTRY."/template/priv/privUI.php";

class privView extends AppView{

	public function priv_wrap($userInfo,$content){
		$tpl = "template/priv/body.php";
		ob_start();
		include $tpl;
		$body = ob_get_contents();
		ob_end_clean();
		return View::wrap($body,"priv","template/priv/layout.php");
	}
}