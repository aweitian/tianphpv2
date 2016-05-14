<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
class doctorView extends privView{
	
	
	public function showList(pmcaiUrl $url,$userinfo,$data,$dlv,$page,$length,$q){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["q"] = $q;
		$data["doctor_lv"] = $dlv;
		$content = $this->fetch("list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	public function showDoctorLvList($userinfo,$data,$err){
		$content = $this->fetch("lv_list",array(
			"data" => $data,
			"err" => $err,
		));
		$this->priv_wrap($userinfo, $content)->show();
	}
}