<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class treeView extends privView{
	
	public function showList($userinfo,$pid,$path,$data){
		$content = $this->fetch("list",array(
			"path" => $path,
			"pid" => $pid,
			"data" => $data,
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
	
	
	public function showFormUI($info,$pid,$def=null){
		$content = $this->fetch("form",array(
				"pid" => $pid,
				"def" => $def,
		));
		$this->priv_wrap($info, $content)->show();
	}
	
	
}