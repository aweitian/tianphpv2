<?php
/**
 * Date: 2015-1-20
 * Author: Awei.tian
 * function: 
 */
class session_privAuth{
	/**
	 * @var session
	 */
	private $session;
	private $session_key = "priv_usr_auth_info";
	private $session_key_rc = "priv_usr_auth_rolecode";
	public function __construct(session $session){
		$this->session=$session;
	}
	public function saveInfo($info){
		$this->session->add($this->session_key, $info);
	}
	public function saveRoleCode($rc){
		$this->session->add($this->session_key_rc, $rc);
	}
	public function getRoleCode(){
		return $this->session->get($this->session_key_rc);
	}
	public function isLogined(){
		return $this->session->get($this->session_key_rc) == "privUsr";
	}
	public function getInfo(){
		return $this->session->get($this->session_key);
	}
	public function logout(){
		$this->session->remove($this->session_key);
		$this->session->remove($this->session_key_rc);
		return true;
	}
}