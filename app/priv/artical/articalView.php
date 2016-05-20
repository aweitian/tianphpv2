<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
class articalView extends privView{
	
	
	
	
	
	
	public function showForm($userInfo,$def=null){
		$this->priv_wrap($userInfo, $this->fetch(
				"form",array(
						"def" => $def
				)
			))->show();
	}
	
	
	public function showListForRevReldis(pmcaiUrl $url,$userinfo,$data,$dis_infoes,$page,$length,$dc,$di,$q){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["dis_infoes"] = $dis_infoes;
		$data["dc"] = $dc;
		$data["di"] = $di;
		$data["q"] = $q;
		$content = $this->fetch("revrel-dis",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showListForRevReldoc(pmcaiUrl $url,$userinfo,$data,$doc_infoes,$page,$length,$do,$q){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["doc_infoes"] = $doc_infoes;
		$data["do"] = $do;
		$data["q"] = $q;
		$content = $this->fetch("revrel-doc",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showListForReldoc(pmcaiUrl $url,$userinfo,$data,$doc_infoes,$page,$length){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["doc_infoes"] = $doc_infoes;
		$content = $this->fetch("rel-doc",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showListForReldis(pmcaiUrl $url,$userinfo,$data,$dis_infoes,$page,$length){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["dis_infoes"] = $dis_infoes;
		$content = $this->fetch("rel-dis",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
// 	public function showListForReldoc(pmcaiUrl $url,$userinfo,$data,$page,$length,$q){
// 		$data["pageSize"] = $length;
// 		$data["pageBtnLen"] = 5;
// 		$data["curPageNum"] = $page;
// 		$data["url"] = $url;
// 		$data["q"] = $q;
// 		$content = $this->fetch("rel-doctor",$data);
// 		$this->priv_wrap($userinfo, $content)->show();
// 	}
	public function showList(pmcaiUrl $url,$userinfo,$data,$page,$length,$q){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["q"] = $q;
		$content = $this->fetch("list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	
	public function showOpSucc($info,$op,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("提示", $op."成功".$ret))->show();
	}
	
	public function showEditSucc($info,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("编辑", "编辑成功".$ret))->show();
	}
	
	
	public function showAddSucc($info,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("添加", "添加成功".$ret))->show();
	}
	
	
}