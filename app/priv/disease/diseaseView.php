<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
class diseaseView extends privView{
	
	
	
	public function import($info){
		$this->priv_wrap($info, $this->fetch("import"))->show();
	}
}