<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
class doctorView extends privView{
	
	public function showOpSucc($info,$op="操作",$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("提示", $op."成功".$ret))->show();
	}
	public function showForm($userInfo,$def=null){
		$this->priv_wrap($userInfo, $this->fetch(
				"form",array(
						"def" => $def
				)
		))->show();
	}
	public function showList(pmcaiUrl $url,$userinfo,$data,$page,$length,$r,$q,$msg,$from){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["q"] = $q;
		$data["r"] = $r;
		$data["msg"] = $msg;
		$data["from"] = $from;
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