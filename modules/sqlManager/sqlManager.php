<?php
/**
 * Date: Apr 20, 2016
 * Author: Awei.tian
 * Description: 
 */
class sqlManager{
	/**
	 * 
	 * @var SimpleXMLElement
	 */
	private $xml;
	public function __construct($name){
		if(preg_match("/^\w+$/", $name)){
			$name = FILE_SYSTEM_ENTRY . "/app/sql/" . $name . ".xml";
		}
		if(!file_exists($name)){
			tian::throwException("1000");
			return ;
		}
		$this->xml = simplexml_load_file($name);
	}
	public static function getInstance($name){
		return new sqlManager($name);
	}
	public function getSql($xpath,$obj=array()){
		$sql = $this->xml->xpath($xpath);
		if($sql && is_array($sql) && count($sql) == 1){
			$sql =  $sql[0]->__toString();
			if(!empty($obj))
				return strtr($sql,$obj);
			else 
				return $sql;
		}
		return "";
	}
}
//$xml = simplexml_load_file('test.xml');
//var_dump($xml->xpath("/note/to")[0]);
//echo $xml->xpath("/note/to")[0];