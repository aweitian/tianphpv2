<?php
class hosipitalView extends AppView {
	
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
	public function lst($model,$page){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
					dirname(__FILE__)."/tpl/list.tpl.php", 
					array(
							"model"=>$model,
							"page" => $page
							
					)
				)
		)
		->setLayout()
		->reponse();
	}
	
	
}