<?php
/**
 * Date: 2016-04-18
 * Author: Awei.tian
 * Description: 
 */
class ideaqModel extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
		$this->initSqlManager("ideaq");
	}
	public function getIedaPraentInfo($id_id){
		//创意
		$id_info = $this->getIdeaById($id_id);
		if(empty($id_info)){
			return new rirResult(1,"idea querys failed");
		}
		//单元
		$un_info = $this->getUnitById($id_info["un_id"]);
		if(empty($un_info)){
			return new rirResult(2,"unit querys failed");
		}
		//计划
		$pl_info = $this->getPlanById($un_info["pl_id"]);
		if(empty($pl_info)){
			return new rirResult(3,"plan querys failed");
		}
		//帐户
		$ac_info = $this->getAccountById($pl_info["ac_id"]);
		if(empty($ac_info)){
			return new rirResult(4,"account querys failed");
		}
		//渠道
		$ch_info = $this->getChananelById($ac_info["ch_id"]);
		if(empty($ch_info)){
			return new rirResult(5,"chananel querys failed");
		}
		
		return new rirResult(0,"ok",array(
			"ch" => $ch_info,
			"ac" => $ac_info,
			"pl" => $pl_info,
			"un" => $un_info,
			"id" => $id_info
		));
	}
	public function getChananelById($id){
		return $this->db->fetch($this->sqlManager->getSql("/sql/channel"), array(
		 	"ch_id" => $id
		 ));
	}
	public function getAccountById($id){
		return $this->db->fetch($this->sqlManager->getSql("/sql/account"), array(
				 		"ac_id" => $id
				 ));
	}
	public function getPlanById($id){
		return $this->db->fetch($this->sqlManager->getSql("/sql/plan"), array(
			 		"pl_id" => $id
			 ));
	}
	public function getUnitById($id){
		return $this->db->fetch($this->sqlManager->getSql("/sql/unit"), array(
			 		"un_id" => $id
			 ));
	}
	public function getIdeaById($id){
		return $this->db->fetch($this->sqlManager->getSql("/sql/idea"), array(
			 		"id_id" => $id
			 ));
	}
}