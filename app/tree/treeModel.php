<?php
class treeControllerNotFoundModel extends AppModel {
	public $data;
	public $channel = 0;
	public $aid = 0;
	public function __construct() {
		
	}
	


	public function getArticleRow($aid){
		return articleUIApi::getInstance()->rowNoContent($aid);
	}

	public function getContent($aid,$len){
		return articleUIApi::getInstance()->row($aid,$len);
	}
	
	
	
}