<?php
class appraiseView extends AppView {
	
	public function appraise($model){
		return defTplData::getInstance()
		->push(defTplData::TYPE_INCLUDE_NOW, array(
			dirname(__FILE__)."/tpl/index.tpl.php",
			array("model" => $model)
		))
		->setLayout()
		->reponse();
	}
	
	
}