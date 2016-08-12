<?php
class doctorsViewControllerNotFound extends AppView {
	public function askcontent($model, $askid) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDocThemePath () . "/ask.tpl.php",
				array (
						"m" => $model,
						"askid" => $askid 
				) 
		) )->setLayout ()->reponse ();
	}
	public function content($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDocThemePath () . "/content.tpl.php",
				array (
						"m" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function home($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDocThemePath () . "/home.tpl.php",
				array (
						"m" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function ask($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDocThemePath () . "/asklist.tpl.php",
				array (
						"m" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function present($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDocThemePath () . "/present.tpl.php",
				array (
						"m" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function article($model) {
		return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
				$this->getDocThemePath () . "/article.tpl.php",
				array (
						"m" => $model 
				) 
		) )->setLayout ()->reponse ();
	}
	public function appraise($model) {
			return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
					$this->getDocThemePath () . "/appraise.tpl.php",
					array (
							"m" => $model
					)
			) )->setLayout ()->reponse ();			
	}
	public function letter($model) {
			return defTplData::getInstance ()->push ( defTplData::TYPE_INCLUDE_NOW, array (
					$this->getDocThemePath () . "/letter.tpl.php",
					array (
							"m" => $model
					)
			) )->setLayout ()->reponse ();			
	}
}