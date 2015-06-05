<?php
class identityToken implements arrayaccess{
	private $info = array();
	private $ip = '';
	private $role = "";
	public function __construct($ip){
		$this -> ip = $ip;
	}	
	public function getIp(){
		return $this->ip;
	}
	public function getRoleCode(){
		return $this->role;
	}
	public function offsetSet($offset, $value){
		$r = & $this -> _key($offset);
		if(is_array($r)){
			 $r[$offset] = $value;
			 return true;
		}
		$r = $value;
	}
	public function offsetExists($offset) {
		$r = $this -> _key($offset);
		if(is_array($r)){
			if(array_key_exists($offset,$r))return isset($r[$offset]);
			return false;
		}
		return isset($r);
	}
	public function offsetUnset($offset) {
		$r = & $this -> _key($offset);
		if(is_array($r)){
			unset($r[$offset]);
		}
		unset($r);
	}
	public function offsetGet($offset) {
		$value = $this -> _key($offset);
		if(is_array($value)){
			if(array_key_exists($offset,$value))return $value[$offset];
			return null;
		}
		return $value;
	}
	public function help(){
		return "ip->*(在I的左上角),role->$(在R的左上角),空白访问info";
	}
	public function getInfo(){
		return $this->info;
	}
	public function setInfo($info){
		if(is_array($info)){
			$this->info = $info;
		}
		return $this;
	}
	public function setRoleCode($role){
		$this->role = $role;
		return $this;
	} 
//---------------------------------------------------------------------		
	private function & _key($offset){
		$_role = $this -> _role($offset);
		$_ip = $this -> _ip($offset);
		if($_role)return $this -> role;
		if($_ip)return $this -> ip;
		return $this -> info;
	}

	private function _role($offset){
		//在r字母上面一个
		return (substr($offset,0,1) === '$');
	}	
	private function _ip($offset){
		//在i字母上面一个
		return (substr($offset,0,1) === '*');
	}		
}