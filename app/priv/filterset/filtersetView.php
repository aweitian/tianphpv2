<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class filtersetView extends privView{
	
	public function showList($userinfo,$msg,$model){
		$content = $this->fetch("list",array(
			"msg" => $msg,
			"model" => $model,
		));
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	public function import($info){
		$this->priv_wrap($info, $this->fetch("import"))->show();
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
	
	
	
	
	public function showFormUI($info,$msg,$model){
		$content = $this->fetch("form",array(
				"msg" => $msg,
				"model" => $model,
		));
		$this->priv_wrap($info, $content)->show();
	}
	
	
}