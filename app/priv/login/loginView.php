<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class loginView extends privView{
	
	
	public function loginUI(){
		$this->wrap($this->fetch("form"))->show();
	}
	
	
}