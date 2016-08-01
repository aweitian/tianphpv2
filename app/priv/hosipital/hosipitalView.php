<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class hosipitalView extends privView{
	
	public function showOpSucc($info,$op="操作",$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("提示", $op."成功".$ret))->show();
	}
	
	
	public function showForm($userInfo,$def=null){
		$content = $this->fetch("form",array(
			"def" => $def
		));
		$this->priv_wrap($userInfo, $content)->show();
	}

	public function showList($userinfo,$data){
		
		
		$content = $this->fetch("list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	
}