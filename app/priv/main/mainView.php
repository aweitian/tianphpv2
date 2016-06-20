<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class mainView extends privView{
	
	public function main($info,$content){
		$this->priv_wrap($info,$content)->show();
	}
	
	
}