<?php
require_once FILE_SYSTEM_ENTRY."/app/data/info/diseaseExtInfoes.php";
class diseaseView extends AppView {
	
	public function disease($model){
		return defTplData::getInstance()
		->push(
			defTplData::TYPE_INCLUDE_NOW,
			array(
				dirname(__FILE__)."/tpl/index.tpl.php",
				array("model" => $model)
			)
		)
		->setLayout()
		->reponse();
	}
	
	
	public function home($model){
		return defTplData::getInstance()
		->push(
			defTplData::TYPE_INCLUDE_NOW,
			array(
				dirname(__FILE__)."/tpl/home.tpl.php",
				array("model" => $model)
			)
		)
		->setLayout()
		->reponse();
	}
	
	
}