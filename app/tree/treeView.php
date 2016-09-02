<?php

class treeControllerNotFoundView extends AppView {
	public function channel($model,$tpl) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$tpl,
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function article($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getTreeThemePath () . "/content.tpl.php",
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
}