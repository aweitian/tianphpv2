<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/utility/pagination.php';
class doctorView extends privView{
	
	
	
	public function showRelArticle($userInfo,$di){
		$this->priv_wrap($userInfo, $this->fetch(
				"rel-article",array(
					"doctor_infoes" => 	$di
				)
		))->show();
	}
	public function showListForRevLv(pmcaiUrl $url,$userinfo,$data,$lvMeta){
		$content = $this->fetch("rev-lv",array(
			"data" => $data,
			"meta" => $lvMeta
		));
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showListForRellv(pmcaiUrl $url,$userinfo,$data,$lv_infoes,$page,$length){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["lv_infoes"] = $lv_infoes;
		$content = $this->fetch("rel-lv",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
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
	public function showExtList($userinfo,$data,$page,$length,$q){
		$msg = array();
		$msg["count"] = $data->info;
		$msg["data"] = $data->return;
		$msg["q"] = $q;
		$msg["pageSize"] = $length;
		$msg["pageBtnLen"] = 5;
		$msg["curPageNum"] = $page;
		$content = $this->fetch("extlist",$msg);
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showExdForm($userInfo,$noextinfo,$lvMeta,$def=null){
		$this->priv_wrap($userInfo, $this->fetch(
				"extform",array(
						"lvMeta" => $lvMeta,
						"info" => $noextinfo,
						"def" => $def
				)
		))->show();
	}
}