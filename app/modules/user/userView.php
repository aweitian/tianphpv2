<?php
class userView extends AppView {
	
	public function login($model,$info=""){
		include dirname(__FILE__)."/tpl/login.tpl.php";
	}
	public function register($model){
		include dirname(__FILE__)."/tpl/register.tpl.php";
	}
	public function resetpwd($model){
		include dirname(__FILE__)."/tpl/resetpwd.tpl.php";
	}
}