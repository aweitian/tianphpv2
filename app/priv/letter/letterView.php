<?php
/**
 * Date: 2016-05-14
 * Author: Awei.tian
 * Description: 
 */
class letterView extends privView{
	
	
	public function showOpSucc($info,$op="操作",$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("提示", $op."成功".$ret))->show();
	}
	
	public function showList($userinfo,$data,$err){
		$content = $this->fetch("list",array(
			"data" => $data,
			"err" => $err,
		));
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	public function showForm($userInfo,$usr,$doc,$dis,$def=null){
		$this->priv_wrap($userInfo, $this->fetch(
			"form",array(
				"def" => $def,
				"usr" => $usr,
				"doc" => $doc,
				"dis" => $dis,
			)
		))->show();
	}
}