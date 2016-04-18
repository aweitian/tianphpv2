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
	}
	public function getIedaPraentInfo($id_id){
		$id_info = $this->getIdeaById($id_id);
		if(empty($id_info)){
			return new rirResult(1,"idea querys failed");
		}
		$un_info = $this->getUnitById($id_info[""]);
		
	}
	public function getChananelById($id){
		return $this->db->fetch("SELECT 
			`ch_id`,`ch_val`
		 FROM `data_channel` 
		 WHERE `ch_id` = :ch_id", array(
		 	"ch_id" => $id
		 ));
	}
	public function getAccountById($id){
		return $this->db->fetch("SELECT 
			`ac_id`,`dev`,`ch_id`,`ac_val`
		 FROM `data_account` WHERE `ac_id` = :ac_id", array(
				 		"ac_id" => $id
				 ));
	}
	public function getPlanById($id){
		return $this->db->fetch("SELECT 
			`pl_id`,`ac_id`,`pl_val`
		 FROM `data_plan` WHERE `pl_id` = :pl_id", array(
			 		"pl_id" => $id
			 ));
	}
	public function getUnitById($id){
		return $this->db->fetch("SELECT 
			`un_id`,`pl_id`,`un_val`,`un_code`
		 FROM `data_unit` WHERE `un_id` = :un_id", array(
			 		"un_id" => $id
			 ));
	}
	public function getIdeaById($id){
		return $this->db->fetch("SELECT 
			`id_id`,`un_id`,`title`,`desc1`,`desc2`,`url`,`id_code`
		 FROM `data_idea` WHERE `id_id` = :id_id", array(
			 		"id_id" => $id
			 ));
	}
}