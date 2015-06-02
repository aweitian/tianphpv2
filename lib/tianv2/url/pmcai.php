<?php
/**
 * @author awei.tian
 * date: 2013-9-16
 * 说明:把数组和pmcap形成映射关系
 */
class pmcai{
	public static function getEmptyPmcai(){
		return array(
			"preurl"   => array(),
			"module"   => "",
			"control"  => "",
			"action"   => "",
			"pathinfo" => array()
		);
	}
	/**
	 * 
	 * @param array $data
	 * @param string $maskPmcai
	 * @return array of pmcai
	 */
	public static function getPmcai($data,$maskPmcai){
		$x=0;$url_arr=$data;$pmcai_mask_arr=str_split($maskPmcai);$pmcai=self::getEmptyPmcai();
		while ($x<count($url_arr)){
			if($x>=count($pmcai_mask_arr))$z="i";
			else $z=$pmcai_mask_arr[$x];
			$v=$url_arr[$x];
			switch ($z){
				case "p":$pmcai["preurl"][]=$v;break;
				case "m":$pmcai["module"]=$v;break;
				case "c":$pmcai["control"]=$v;break;
				case "a":$pmcai["action"]=$v;break;
				case "i":$pmcai["pathinfo"][]=$v;break;
			}
			$x++;
		}
		return $pmcai;
	}
	public static function isValidPmcaiMask($mask){
		return preg_match("/^p*m?c?a?$/", $mask);
	}
	public static function fixArrToPmcai($arr){
		if(!is_array($arr))return self::getEmptyPmcai();
		$arr=$arr+self::getEmptyPmcai();
		foreach ($arr as $k=>$v){
			if(!array_key_exists($k, self::getEmptyPmcai())){
				unset($arr[$k]);
			}
		}
		return $arr;
	}
}