<?php

class treeControllerNotFoundView extends AppView {
	public function ask($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDisThemePath () . "/ask.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function tree($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDisThemePath () . "/index.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function doctors($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDisThemePath () . "/doctors.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function knowledge($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDisThemePath () . "/knowledge.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function article($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDisThemePath () . "/article.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
}