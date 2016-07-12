<?php
class askView extends AppView {

	
	
	
	public function ask($model){
		return defTplData::getInstance()
		->push(defTplData::TYPE_INCLUDE_NOW, array(
			dirname(__FILE__)."/tpl/index.tpl.php",
			array("model" => $model)
		))
		->setLayout()
		->reponse();
	}
	
	public function lv0($model){
		return defTplData::getInstance()
		->push(defTplData::TYPE_INCLUDE_NOW, array(
			dirname(__FILE__)."/tpl/index.tpl.php",
			array("model" => $model)
		))
		->setLayout()
		->reponse();
	}
	
	
}