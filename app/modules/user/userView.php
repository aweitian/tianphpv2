<?php
class userView extends AppView {
	public function login($model, $info = "") {
		include dirname ( __FILE__ ) . "/tpl/login.tpl.php";
	}
	public function register($model) {
		include dirname ( __FILE__ ) . "/tpl/register.tpl.php";
	}
	public function resetpwd($model) {
		include dirname ( __FILE__ ) . "/tpl/resetpwd.tpl.php";
	}
	public function profile($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				dirname ( __FILE__ ) . "/tpl/profile.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
		// include dirname(__FILE__)."/tpl/profile.tpl.php";
	}
}