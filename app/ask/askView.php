<?php
require_once FILE_SYSTEM_ENTRY."/app/data/info/diseaseExtInfoes.php";
class askView extends AppView {
	
	public function lst($info){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
					dirname(__FILE__)."/tpl/list.tpl.php", 
					array(
							"info"=>$info,
							
					)
				)
		)
		->setLayout()
		->reponse();
	}
	
}