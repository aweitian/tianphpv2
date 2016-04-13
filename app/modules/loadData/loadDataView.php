<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
class loadDataView extends AppView{
	
	public function showFormUI($submit_url){
		$this->wrap($this->fetch("form",array(
				"submit_url"=>$submit_url
		)),"Upload a cvs file")->show();
	}
	
}