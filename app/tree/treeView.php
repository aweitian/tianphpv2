<?php
class treeControllerNotFoundView extends AppView {
	public function lst($model, $tpl) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$tpl,
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function page($model, $tpl) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$tpl,
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function cls($model, $tpl) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$tpl,
				array (
						"model" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
}