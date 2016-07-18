<?php
class a{
	private $docache;
	public function __construct(){
		$this->docache = array(
			array("star" => 2,"name" => "ccc"),	
			array("star" => 12,"name" => "safd"),	
			array("star" => 33,"name" => "qwer"),	
			array("star" => 1,"name" => "ccwewec"),	
			array("star" => 63,"name" => "casfdcc"),	
			array("star" => 23,"name" => "qe"),	
		);
	}
	public function getTopStar($length){
		$ret = $this->docache;
		$ret = sort($ret,array($this,"_cpm"));
		var_dump($ret) ;
	}
	
	private function _cpm($a,$b){
		if ($a["star"] == $b["star"]) {
			return 0;
		} else {
			return $a["star"] > $b["star"] ? 1 : -1;
		}
	}
}

(new a())->getTopStar(2);
?>