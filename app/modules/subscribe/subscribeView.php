<?php
class subscribeView extends AppView {
	public function subscribe($model) {
		if(APP_MOBILE_MODE){
			return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
					$this->getThemePath ( "subscribe" ) . "/index.tpl.php",
					array (
							"model" => $model
					)
			) )->setLayout ()->reponse ();
		}else{
			include $this->getThemePath ( "subscribe" ) . "/index.tpl.php";
		}
		
	}
}