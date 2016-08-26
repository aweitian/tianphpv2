<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */

class loginView extends privView{
	
	
	public function loginUI($auth,$msg,$url){
		$this->wrap($this->fetch("form",array(
				"auth" => $auth,
				"msg" => $msg,
				"url" => $url,
		)),FILE_SYSTEM_ENTRY."/template/priv/layout.php")->show();
	}
	
	
}