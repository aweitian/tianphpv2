<?php
/**
 * Date: 2016-05-13
 * Author: Awei.tian
 * Description: 
 */
class userView extends privView{
	
	public function showForm($userInfo,$def=null){
		$this->priv_wrap($userInfo, $this->fetch(
				"form",array(
						"def" => $def
				)
		))->show();
	}
	
	
	public function showList(pmcaiUrl $url,$userinfo,$data,$page,$length,$q){
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["q"] = $q;
		$content = $this->fetch("list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	
	public function showEditSucc($info,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("编辑", "编辑成功".$ret))->show();
	}
	public function showOpSucc($info,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("提示", "操作成功".$ret))->show();
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