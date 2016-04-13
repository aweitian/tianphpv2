<?php
/**
 * Date: 2016-04-12
 * Author: Awei.tian
 * Description: 
 */
class loginView extends AppView{
	
	
	public function showLoginUI($submit_url){
		$this->wrap($this->fetch("form",array(
			"submit_url"=>$submit_url
		)),"Signing to console")->show();
	}
	
}