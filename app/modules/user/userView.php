<?php
class userView extends AppView {
	public function login($model, $info = "") {
		if(APP_MOBILE_MODE){
			return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
					$this->getThemePath ( "user" ) . "/login.tpl.php",
					array (
							"model" => $model,
							"info" => $info
					)
			) )->setLayout ()->reponse ();
		} else {
			include $this->getThemePath ( "user" ) . "/login.tpl.php";
		}
	}
	public function register($model,$info = "") {
		include $this->getThemePath ( "user" ) . "/register.tpl.php";
	}
	public function resetpwd($model, $info = "") {
		include $this->getThemePath ( "user" ) . "/resetpwd.tpl.php";
	}
	public function profile($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/profile.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function modify($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/modify.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function avatar($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/avatar.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function letter($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/letter.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function writeletter($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/write-letter.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function writeappraise($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/write-appraise.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	public function appraise($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/appraise.tpl.php",
				array (
						"model" => $model,
						"info" => $info 
				) 
		) )->setLayout ()->reponse ();
	}
	
	
	
	
	public function questions($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/questions.tpl.php",
				array (
						"model" => $model,
						"info" => $info
				)
		) )->setLayout ()->reponse ();
	}
	

	public function presents($model, $info = "") {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_DELAY, array (
				$this->getThemePath ( "user" ) . "/presents.tpl.php",
				array (
						"model" => $model,
						"info" => $info
				)
		) )->setLayout ()->reponse ();
	}
}