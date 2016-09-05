<?php
/**
 * Date: 2016-05-21
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/utility/pagination.php';
class askView extends privView{
	
	public $model;
	
	
	public function showForm($userInfo,$model,$uid,$docInfo,$disInfo,$def=null){
// 		var_dump($docInfo);exit;
		$this->priv_wrap($userInfo, 
			$this->fetch(
				"form",
				array(
					
					"model" => $model,
					"def" => $def,
					"uid" => $uid,
					"doc_infoes" => $docInfo,
					"dis_infoes" => $disInfo
				)
			)
		)->show();
	}
	
	public function showAllForm($userInfo,$model){
// 		var_dump($docInfo);exit;
		$this->priv_wrap($userInfo, 
			$this->fetch(
				"allform",
				array(
					"model" => $model
				)
			)
		)->show();
	}
	
	public function showAppendForm($userInfo,$askid,$role,$present,$def=null){
// 		var_dump($docInfo);exit;
		$this->priv_wrap($userInfo, 
			$this->fetch(
				"append",
				array(
					"def" => $def,
					"askid" => $askid,
					"role" => $role,
					"present" => $present
				)
			)
		)->show();
	}
	
	public function showList(pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){
	
		$data["data"] = $data;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	
	}
	
	
	public function showUidList(pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){

		$data["data"] = $data;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("ask4uid_list",$data);
		$this->priv_wrap($userinfo, $content)->show();

	}
	public function showDodList(pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){

		$data["data"] = $data;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("ask4dod_list",$data);
		$this->priv_wrap($userinfo, $content)->show();

	}
	
	
	public function showPresent($userinfo,$data){
		$content = $this->fetch("present",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	public function showAppendView($userinfo,$data){
		$content = $this->fetch("ap_view",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	
	public function showOpSucc($info,$op,$ret_url,$lst_ret=""){
		if($ret_url != ""){
			$ret = ",<a href='".$ret_url ."'>返回</a>";
			if($lst_ret){
				$ret .= " 或者 <a href='".$lst_ret."'>返回到列表页</a>";
			}
		}else{
			$ret = "";
		}
	
		$this->priv_wrap($info, $this->info("编辑", $op."成功".$ret))->show();
	}
	
	
	public function showUsrList($oplnk,pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){
		$data["data"] = $data;
		$data["oplnk"] = $oplnk;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("usr_list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
	public function showDocList(pmcaiUrl $url,$userinfo,$cnt,$data,$page,$length,$q){
		$data["data"] = $data;
		$data["pageSize"] = $length;
		$data["pageBtnLen"] = 5;
		$data["curPageNum"] = $page;
		$data["url"] = $url;
		$data["cnt"] = $cnt;
		$data["q"] = $q;
		$content = $this->fetch("doc_list",$data);
		$this->priv_wrap($userinfo, $content)->show();
	}
}