<?php
/**
 * Date: 2016-05-13
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/user/user.api.php";
class userModel extends privModel{
	private $api;
	public function __construct(){
		parent::__construct();
		$this->api = new userApi();
	}
	
	public function row($sid){
		return $this->api->row($sid);
	}

	public function getRpq($sid){
		return $this->api->getRpq($sid);
	}
	
	
	public function forceResetPwd($sid,$pwd){
		return $this->api->forceResetPwd($sid, $pwd);
	}
	
	public function updateEml($sid,$eml){
		return $this->api->updateEml($sid, $eml);
	}
	public function updatePwd($sid,$old,$new){
		return $this->api->updatePwd($sid, $old, $new);
	}
	
	public function ResetPwd($sid,$pwd,$rpq,$rpa){
		return $this->api->ResetPwd($sid, $pwd, $rpq, $rpa);
	}
	
	public function q($q,$offset,$len){
		return $this->api->q($q, $offset, $len);
	}
	
	public function getList($offset=0,$len=10){
		return $this->api->getList($offset,$len);
	}
	
	public function register($email,$name,$pwd,$phone,$avatar,$rpq,$rpa){
		return $this->add($email, $name, $pwd, $phone, $avatar, $rpq, $rpa, date("Y-m-d"));
	}
	
	public function add($email,$name,$pwd,$phone,$avatar,$rpq,$rpa,$date){
		return $this->api->add($email, $name, $pwd, $phone, $avatar, $rpq, $rpa, $date,true);
	}
	
	public function update($sid,$email,$name,$phone,$avatar,$date){
		return $this->api->update($sid, $email, $name, $phone, $avatar, $date);
	}
	
	public function remove($sid){
		return $this->api->remove($sid);
	}
}