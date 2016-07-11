<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class uploadView extends privView{
	
	public function upload($info,$content){
		$this->priv_wrap($info,$content)->show();
	}
	
	
}