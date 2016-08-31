<?php
/**
 * @author: awei.tian
 * @date: 2013-11-18
 * @function:base32
 */
//$test = new base32();
//echo $test->encode("taw");
//echo "<br>";
//echo $test->decode($test->encode("asdlfjweixclkfjwe9ruwe6876%$#$23094812$%$"));
//echo decbin(ord("w"));
class base32{
	private $hashtable = "abcdefghjkmnpqrstuwxyz0123456789";
	public function encode($s){
		$i = 0;$prev=0;$ascii=0;$mod=0;
		$result = array();
		while($i<strlen($s)){
			$ascii=ord($s[$i]);
			$result[]=str_pad(decbin($ascii), 8, "0", STR_PAD_LEFT);
			$i++;
		}
		$_t = str_split(join("",$result),5);
		$len = count($_t);
		$result=array();
		foreach($_t as $val){
			$result[]=$this->hashtable[bindec($val)];	
		}
		return strlen($_t[$len-1]).join("",$result);
	}
	public function decode($s){
		$i = 1;$prev=0;$ascii=0;$mod=0;$cur;
		$result = array();
		while($i<strlen($s)){
			$cur=strpos($this->hashtable,$s[$i]);
			$result[]=str_pad(decbin($cur), 5, "0", STR_PAD_LEFT);
			$i++;
		}
		$len = count($result);
		$result[$len-1] = substr($result[$len-1],5-$s[0]);
		$_t = str_split(join("",$result),8);
		$len = count($_t);
		$result=array();
		foreach($_t as $val){
			$result[]=chr(bindec($val));	
		}
		return join("",$result);
	}
}