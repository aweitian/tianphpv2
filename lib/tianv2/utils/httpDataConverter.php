<?php
/**
 * @author awei.tian
 * date: 2013-9-11
 * 说明:
 */
class httpDataConverter{
	/**
	 * 
	 * @param string $str
	 * @return array:
	 * 
		$query = 'foo.bar=stuff';    // foo (dot) bar
		parse_str( $query , $output);
		print_r( $output );
		will output (underscore)
		Array
		(
		    [foo_bar] => stuff
		)
		and not as expected (dot)
		Array
		(
		    [foo.bar] => stuff
		)
		Query part of a requested URI is parsed the same. So never send 
		parameters with a dot in their names
	 */
	public static function formToArray($str){
		$ret=array();
		parse_str($str, $ret);
		return $ret;
	}
	/**
	 * @return string
	 * @param string $str
	 */
	public static function formToJson($str){
		$ret=self::formStringToArray($str);
		return json_encode($ret);
	}
	/**
	 * @return string
	 * @param array $data
	 * @param string $numeric_prefix
	 */
	public static function arrayToForm($data,$numeric_prefix="numeric_prefix"){
		return http_build_query($data,$numeric_prefix); 
	}
	/**
	 * @return string
	 * @param array $value
	 */
	public static function arrayToJson($value){
		return json_encode($value);
	}
	/**
	 * @return array
	 * @param string jsonstring 
	 */
	public static function jsonToArray($jsonString){
		return json_decode($jsonString,true);
	}
	/**
	 * @param string $jsonString
	 * @return string
	 */
	public static function jsonToForm($jsonString){
		$ret=self::jsonToArray($jsonString);
		return self::arrayToForm($ret);
	}
	public static function isJson($data){
		try{
			return null !== json_decode($data,true);
		}catch (Exception $e){
			return false;
		}
	}
	public static function pathinfoToArr($p){
		$p=trim($p,"/");
		return explode("/", $p);
	}
}