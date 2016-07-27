<?php
class askView extends AppView {
	
	public function page($model,$aid){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
					dirname(__FILE__)."/tpl/page.tpl.php", 
					array(
							"model"=>$model,
							"aid"=>$aid
							
							
					)
				)
		)
		->setLayout()
		->reponse();
	}
	
	
	
}