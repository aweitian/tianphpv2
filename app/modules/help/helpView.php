<?php
class helpView extends AppView {
	public function routing($model) {
// 		var_dump($this->getThemePath ( "help" ));exit;
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "help" ) . "/routing.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function about($model) {
// 		var_dump($this->getThemePath ( "help" ));exit;
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "help" ) . "/about.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function sendsmsproxy($model){
		include $this->getThemePath ( "help" )."/sendsmsproxy.tpl.php";
	}
	
	
	public function process($model) {
	
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "help" ) . "/process.tpl.php",
				array (
						"model" => $model
				)
		) )->setLayout ()->reponse ();
	}
	
	public function notice($model) {
	
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "help" ) . "/notice.tpl.php",
				array (
						"model" => $model
				)
		) )->setLayout ()->reponse ();
	}
	
	public function statement($model) {
	
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "help" ) . "/statement.tpl.php",
				array (
						"model" => $model
				)
		) )->setLayout ()->reponse ();
	}
	public function toll($model) {
	
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "help" ) . "/toll.tpl.php",
				array (
						"model" => $model
				)
		) )->setLayout ()->reponse ();
	}
	public function environment($model) {
	
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "help" ) . "/environment.tpl.php",
				array (
						"model" => $model
				)
		) )->setLayout ()->reponse ();
	}
	
}