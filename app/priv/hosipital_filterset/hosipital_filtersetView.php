<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class hosipital_filtersetView extends privView{
	public function showOpSucc($info,$op="操作",$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("提示", $op."成功".$ret))->show();
	}
	public function hosipital_filterset($userInfo,$msg,$model){
		$content = $this->fetch("list",array(
				"msg" => $msg,
				"model" => $model
		));
		$this->priv_wrap($userInfo, $content)->show();
	}
	public function form($userInfo,$msg,$model){
		$content = $this->fetch("form",array(
				"msg" => $msg,
				"model" => $model
		));
		$this->priv_wrap($userInfo, $content)->show();
	}
	
	
}