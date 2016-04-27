<?php
/**
 * Date: 2016-04-26
 * Author: Awei.tian
 * Description: 
 */
class queryView extends AppView{
	public function showFormUI($submit_url){
		$this->wrap($this->fetch("form",array(
				"submit_url"=>$submit_url
		)),"Upload a csv file")->show();
	}
}