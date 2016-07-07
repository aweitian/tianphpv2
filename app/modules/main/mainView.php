<?php
class mainView extends AppView {
	
	public function main($model){
		return defTplData::getInstance()
		->feed(dirname(__FILE__)."/tpl/index.tpl.php", array("model"=>$model))
		->setLayout()
		->reponse();
	}
	
	
}