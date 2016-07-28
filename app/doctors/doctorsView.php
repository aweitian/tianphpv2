<?php

class doctorsViewControllerNotFound extends AppView {

	
	
	public function askcontent($model,$askid){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
						dirname(__FILE__)."/tpl/ask.tpl.php",
						array(
								"m" => $model,
								"askid" => $askid
						)
				)
		
		)
		->setLayout()
		->reponse();
	}
	
	public function content($model){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
						dirname(__FILE__)."/tpl/content.tpl.php",
						array("m" => $model)
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
						array("m" => $model)
				)
				
		)
		->setLayout()
		->reponse();
	}
	public function ask($model){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
						dirname(__FILE__)."/tpl/asklist.tpl.php",
						array("m" => $model)
				)
				
		)
		->setLayout()
		->reponse();
	}
	public function present($model){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
						dirname(__FILE__)."/tpl/present.tpl.php",
						array("m" => $model)
				)
				
		)
		->setLayout()
		->reponse();
	}
	public function article($model){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
						dirname(__FILE__)."/tpl/article.tpl.php",
						array("m" => $model)
				)
				
		)
		->setLayout()
		->reponse();
	}
}