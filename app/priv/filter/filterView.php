<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
class filterView extends privView{
	public function showList($userinfo,$model){
		$content = $this->fetch("list",array(
			"model" => $model,
			"info" => $userinfo
		));
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showForm($userinfo,$model,$act = "add"){
		$content = $this->fetch("form",array(
			"model" => $model,
			"act" => $act,
				"info" => $userinfo
		));
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showOpResult($info,$op,$ret_url){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
		}else{
			$ret = "";
		}
		$this->priv_wrap($info, $this->info("编辑", $op.$ret))->show();
	}
}