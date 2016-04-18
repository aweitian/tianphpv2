<?php
/**
 * Date: 2016-04-18
 * Author: Awei.tian
 * Description: 
 */
class ideaqView extends AppView{
	public function showFormUI($submit_url,$queryResult=""){
		$this->wrap(
			$this->fetch("form",array(
				"submit_url" => $submit_url,
				"content"    => $queryResult
			))
		)->show();
	}
}