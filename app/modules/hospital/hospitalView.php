<?php
class hospitalView extends AppView {
	public function hospital($model) {
// 		var_dump($this->getThemePath ( "main" ));exit;
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "hospital" ) . "/index.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
}