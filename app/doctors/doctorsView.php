<?php

class doctorsViewControllerNotFound extends AppView {

	
	
	
	public function content($model){
		return defTplData::getInstance()
		->fetch(dirname(__FILE__)."/tpl/article.tpl.php", array("m" => $model))
		->setLayout()
		->reponse();
	}
	
	
}