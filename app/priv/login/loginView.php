<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */

class loginView extends privView{
	
	
	public function loginUI($auth,$msg){
		$this->wrap($this->fetch("form",array(
				"auth" => $auth,
				"msg" => $msg
		)),"priv","template/priv/layout.php")->show();
	}
	
	
}