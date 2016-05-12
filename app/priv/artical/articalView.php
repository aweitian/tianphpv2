<?php
/**
 * Date: 2016-05-12
 * Author: Awei.tian
 * Description: 
 */
class articalView extends privView{
	
	
	
	
	public function showForm($userInfo){
		$this->priv_wrap($userInfo, $this->fetch("form"))->show();
	}
	
	
	public function showList($userinfo,$data){
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
	
	
	public function showAddSucc($info,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("添加", "添加成功".$ret))->show();
	}
	
	
}