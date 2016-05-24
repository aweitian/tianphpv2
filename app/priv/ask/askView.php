<?php
/**
 * Date: 2016-05-21
 * Author: Awei.tian
 * Description: 
 */
class askView extends privView{
	
	
	
	
	public function showForm($userInfo,$uid,$docInfo,$disInfo,$def=null){
// 		var_dump($docInfo);exit;
		$this->priv_wrap($userInfo, 
			$this->fetch(
				"form",
				array(
					"def" => $def,
					"uid" => $uid,
					"doc_infoes" => $docInfo,
					"dis_infoes" => $disInfo
				)
			)
		)->show();
	}
	
	public function showUidList(pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){

		$data["data"] = $data;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("ask4uid_list",$data);
		$this->priv_wrap($userinfo, $content)->show();

	}
	public function showDodList(pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){

		$data["data"] = $data;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("ask4dod_list",$data);
		$this->priv_wrap($userinfo, $content)->show();

	}
	
	
	public function showOpSucc($info,$op,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("编辑", $op."成功".$ret))->show();
	}
	
	
	public function showUsrList($oplnk,pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){
		$data["data"] = $data;
		$data["oplnk"] = $oplnk;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("usr_list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showDocList(pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){
		$data["data"] = $data;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("doc_list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
}