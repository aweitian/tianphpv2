<?php
// class a{
// 	private $docache;
// 	public function __construct(){
// 		$this->docache = array(
// 			array("star" => 2,"name" => "ccc"),	
// 			array("star" => 12,"name" => "safd"),	
// 			array("star" => 33,"name" => "qwer"),	
// 			array("star" => 1,"name" => "ccwewec"),	
// 			array("star" => 63,"name" => "casfdcc"),	
// 			array("star" => 23,"name" => "qe"),	
// 		);
// 	}
// 	public function getTopStar($length){
// 		$ret = $this->docache;
// 		$ret = sort($ret,array($this,"_cpm"));
// 		var_dump($ret) ;
// 	}
	
// 	private function _cpm($a,$b){
// 		if ($a["star"] == $b["star"]) {
// 			return 0;
// 		} else {
// 			return $a["star"] > $b["star"] ? 1 : -1;
// 		}
// 	}
// }

// // (new a())->getTopStar(2);
// file_put_contents("ac.txt","hi");

// define("FILE_SYSTEM_ENTRY",dirname(__FILE__));
// require_once FILE_SYSTEM_ENTRY.'/app/runEnvir/default.php';
// require_once FILE_SYSTEM_ENTRY."/lib/db/mysql/mysqlPdoBase.php";
// require_once FILE_SYSTEM_ENTRY.'/lib/db/mysql/pdo.php';
// $pdo = new mysqlPdoBase();
// $pdo->exec("INSERT `data_user` (`name`) VALUES ('awei')", array());
// preg_match("/for key '(name|email|phone)'$/",$pdo->getErrorInfo(),$matches);
// var_dump($matches);
// $some_string = "test\ntext text\r\n";

// //echo convert_uuencode($some_string);

// //var_dump(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES | ENT_HTML5));
// echo htmlspecialchars('<font color=\'red\'>red</font>');
// $text = '<textarea>h\'"aha</textarea>';
// function utf8Substr($str, $from, $len) {
// 	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
// 			'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
// 			'$1',$str);
// }
// $test = "我爱中国国";
// echo preg_match_all('/([\xC0-\xFF][\x80-\xBF]+){2}|([\xC0-\xFF][\x80-\xBF]+)/',$test,$match) ? join("<br>",$match[0]) : "";
$ret = range(1,9);
shuffle($ret);
var_dump(array_slice($ret,0,$length)) ;
?>
