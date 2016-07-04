<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
class symptomView extends privView{
	
	public function showList($userinfo,$pid,$path,$mv,$data,$maxLv){
		$content = $this->fetch("list",array(
			"path" => $path,
			"pid" => $pid,
			"meta" => $mv,
			"data" => $data,
			"mxlv" => $maxLv
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
	
	
	public function showFormUI($info,$pid,$meta,$dis,$def=null,$sid=0){
		$content = $this->fetch("form",array(
				"pid" => $pid,
				"meta" => $meta,
				"dis" => $dis,
				"def" => $def,
				"sid" => $sid
		));
		$this->priv_wrap($info, $content)->show();
	}
}