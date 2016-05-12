<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
class doctorView extends privView{
	
	
	
	
	public function showDoctorLvList($userinfo,$data,$err){
		$content = $this->fetch("lv_list",array(
			"data" => $data,
			"err" => $err,
		));
		$this->priv_wrap($userinfo, $content)->show();
	}
}