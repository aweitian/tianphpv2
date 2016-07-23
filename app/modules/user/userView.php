<?php
class userView extends AppView {
	public function login($model, $info = "") {
		include dirname ( __FILE__ ) . "/tpl/login.tpl.php";
	}
	public function register($model) {
		include dirname ( __FILE__ ) . "/tpl/register.tpl.php";
	}
	public function resetpwd($model, $info = "") {
		include dirname ( __FILE__ ) . "/tpl/resetpwd.tpl.php";
	}
	public function profile($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				dirname ( __FILE__ ) . "/tpl/profile.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function modify($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				dirname ( __FILE__ ) . "/tpl/modify.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function avatar($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				dirname ( __FILE__ ) . "/tpl/avatar.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function letter($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				dirname ( __FILE__ ) . "/tpl/letter.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function writeletter($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				dirname ( __FILE__ ) . "/tpl/write-letter.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	
	public function appraise($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				dirname ( __FILE__ ) . "/tpl/appraise.tpl.php",
				array (
						"model" => $model,
						"info" => $info
				)
		) )->setLayout ()->reponse ();
	}
}