<?php
class mainView extends AppView {
	public function main($model) {
// 		var_dump($this->getThemePath ( "main" ));exit;
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getThemePath ( "main" ) . "/index.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
}