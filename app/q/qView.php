<?php
require_once FILE_SYSTEM_ENTRY."/app/data/info/diseaseExtInfoes.php";
class qView extends AppView {
	
	public function page($info){
		return defTplData::getInstance()
		->push(
				defTplData::TYPE_INCLUDE_NOW,
				array(
					dirname(__FILE__)."/tpl/page.tpl.php", 
					array(
							"info"=>$info,
							
					)
				)
		)
		->setLayout()
		->reponse();
	}
	
}