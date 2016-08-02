<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class hosipital_filterView extends privView{
	
	public function showUI($info,$model,$msg){
		$content = $this->fetch("search",array(
			"model" => $model,
			"msg"   => $msg	
		));
		$this->priv_wrap($info,$content)->show();
	}
	
	
}