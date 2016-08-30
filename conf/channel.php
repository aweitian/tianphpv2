<?php
class AppChannel {
	const DEVICE_PC = 0x0;
	const DEVICE_M = 0x1;
	const CHANNEL_WX1 = 0x0;
	const CHANNEL_WX2 = 0x1;
	const CHANNEL_PC = 0x2;
	const CHANNEL_PC_SG = 0x3;
	const CHANNEL_SM = 0x4;
	public static $map = array ();
	public static function init() {
		AppChannel::$map = array (
				"haodf.shanghai9l.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_PC,
				"haodf.021long.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_PC,
				"haodf.kowlong120.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_PC,
				"haodf.120nanzi.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_PC,
				"haodf.52733999.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_PC,
				"haodf.52750399.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_PC,
				"vip.52733999.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_PC,
				
				"3g.haodf.shanghai9l.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_M,
				"3g.haodf.021long.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_M,
				"3g.haodf.kowlong120.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_M,
				"3g.haodf.120nanzi.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_M,
				"3g.haodf.52733999.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_M,
				"3g.haodf.52750399.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_M,
				"4g.haodf.52733999.com" => 1 << AppChannel::CHANNEL_WX1 | AppChannel::DEVICE_M,
				
				"haodf.shjiulong.cn" => 1 << AppChannel::CHANNEL_WX2 | AppChannel::DEVICE_PC,
				"3g.haodf.shjiulong.cn" => 1 << AppChannel::CHANNEL_WX2 | AppChannel::DEVICE_M,
				
				"hospital.shlong021.com" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.shqianlx.com" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.sh9long.net" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.sh9l.cn" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.shlong120.cn" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.sh9l.com" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.shjlong.com" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.shzyb.com" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.91shlong.cn" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.nong120.net" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.cs999.cn" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.peopleer.com.cn" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.peopler.com.cn" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.021jiulong.cn" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				"hospital.bestlong021.com" => 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
			"hospital.9longyy.cn"				=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
			"hospital.sh9long.com"				=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
			"hospital.long021.cn"				=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
			"hospital.hospitalkowloon.com" 		=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_PC,
				
			"3g.hospital.shlong021.com"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.shqianlx.com"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.sh9long.net"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.sh9l.cn"				=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.shlong120.cn"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.sh9l.com"				=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.shjlong.com"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.shzyb.com"				=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.91shlong.cn"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.nong120.net"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.cs999.cn"				=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.peopleer.com.cn"		=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.peopler.com.cn"		=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.021jiulong.cn"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.bestlong021.com"		=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.9longyy.cn"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.sh9long.com"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.long021.cn"			=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
			"3g.hospital.hospitalkowloon.com"	=> 1 << AppChannel::CHANNEL_PC | AppChannel::DEVICE_M,
	
				
			"muzhi.hospitalkowloon.com"			=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.kowloon-hospital.com"		=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.shjlong.com"					=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.shjiulong.cn"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.sh9l.cn"						=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.sh9long.net"					=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.shjlong.cn"					=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"yi.shjiulong.cn"					=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.shjiulong.net"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.91shlong.cn"					=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.51long021.com"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
			"muzhi.021sh9l.com"					=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_PC,
				
			"3g.muzhi.hospitalkowloon.com"		=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.kowloon-hospital.com"		=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.shjlong.com"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.shjiulong.cn"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.sh9l.cn"					=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.sh9long.net"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.shjlong.cn"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.yi.shjiulong.cn"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.shjiulong.net"			=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.91shlong.cn"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.51long021.com"			=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
			"3g.muzhi.021sh9l.com"				=> 1 << AppChannel::CHANNEL_PC_SG | AppChannel::DEVICE_M,
	
				
			"yyk.sh9l.cn"						=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.52733999.com"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.shjiulong.org"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.sh9l.com"						=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.91shlong.cn"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.shjlong.com"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.sh9long.cn"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.shjiulong.cn"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.shlong120.com"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.shlong021.com"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.120nanzi.com"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.kowlong120.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.bestlong021.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.long120.net"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"yyk.long120.com.cn"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
			"58.sh9long.net"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_PC,
				
			"3g.yyk.sh9l.cn"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.52733999.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.shjiulong.org"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.sh9l.com"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.91shlong.cn"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.shjlong.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.sh9long.cn"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.shjiulong.cn"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.shlong120.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.shlong021.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.120nanzi.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.kowlong120.com"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.bestlong021.com"			=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.long120.net"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.yyk.long120.com.cn"				=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,
			"3g.58.sh9long.net"					=> 1 << AppChannel::CHANNEL_SM | AppChannel::DEVICE_M,	
			
		);
		
	}

	public static function isChannelWX1($domain = null){
		if(is_null($domain)){
			$domain = $_SERVER["HTTP_HOST"];
		}
		if (!array_key_exists($domain,AppChannel::$map))return false;
		return AppChannel::$map[$domain] & (1 << AppChannel::CHANNEL_WX1);
	}
	public static function isChannelWX2($domain = null){
		if(is_null($domain)){
			$domain = $_SERVER["HTTP_HOST"];
		}
		if (!array_key_exists($domain,AppChannel::$map))return false;
		return AppChannel::$map[$domain] & (1 << AppChannel::CHANNEL_WX2);
	}
	public static function isChannelPC($domain = null){
		if(is_null($domain)){
			$domain = $_SERVER["HTTP_HOST"];
		}
		if (!array_key_exists($domain,AppChannel::$map))return false;
		return AppChannel::$map[$domain] & (1 << AppChannel::CHANNEL_PC);
	}
	public static function isChannelPC_SG($domain = null){
		if(is_null($domain)){
			$domain = $_SERVER["HTTP_HOST"];
		}
		if (!array_key_exists($domain,AppChannel::$map))return false;
		return AppChannel::$map[$domain] & (1 << AppChannel::CHANNEL_PC_SG);
	}
	public static function isChannel_SM($domain = null){
		if(is_null($domain)){
			$domain = $_SERVER["HTTP_HOST"];
		}
		if (!array_key_exists($domain,AppChannel::$map))return false;
		return AppChannel::$map[$domain] & (1 << AppChannel::CHANNEL_SM);
	}
	public static function isDeviceM($domain = null) {
		if(is_null($domain)){
			$domain = $_SERVER["HTTP_HOST"];
		}
		if (!array_key_exists($domain,AppChannel::$map))return false;
		return (AppChannel::$map[$domain] & 1) == AppChannel::DEVICE_M;
	}
	public static function isDevicePC($domain = null) {
		if(is_null($domain)){
			$domain = $_SERVER["HTTP_HOST"];
		}
		if (!array_key_exists($domain,AppChannel::$map))return false;
		return (AppChannel::$map[$domain] & 1) == AppChannel::DEVICE_PC;
	}
	
	public static function getSwt() {
		$domain = $_SERVER["HTTP_HOST"];
		if (AppChannel::isChannelWX1($domain)){
			if(AppChannel::isDeviceM($domain)){
				return "http://keb.twos.net.cn/JS/LsJS.aspx?siteid=KEB34786808&float=1&lng=cn";
			}else{
				return "http://keb.twos.net.cn/JS/LsJS.aspx?siteid=KEB34786808&float=1&lng=cn";
			}
		}else if(AppChannel::isChannelWX2($domain)) {
			if(AppChannel::isDeviceM($domain)){
				return "http://keb.twos.net.cn/JS/LsJS.aspx?siteid=KEB34786808&float=1&lng=cn";
			}else{
				return "http://keb.twos.net.cn/JS/LsJS.aspx?siteid=KEB34786808&float=1&lng=cn";
			}
		}else if(AppChannel::isChannelPC($domain)) {
			if(AppChannel::isDeviceM($domain)){
				return "http://kqi.zoossoft.com/JS/LsJS.aspx?siteid=KQI10880110&float=1&lng=cn";
			}else{
				return "http://kqi.zoossoft.com/JS/LsJS.aspx?siteid=KQI10880110&float=1&lng=cn";
			}
		}else if(AppChannel::isChannelPC_SG($domain)) {
			if(AppChannel::isDeviceM($domain)){
				return "http://kqi.zoossoft.com/JS/LsJS.aspx?siteid=KQI10880110&float=1&lng=cn";
			}else{
				return "http://kqi.zoossoft.com/JS/LsJS.aspx?siteid=KQI10880110&float=1&lng=cn";
			}
		}
		else if(AppChannel::isChannel_SM($domain)) {
			if(AppChannel::isDeviceM($domain)){
				return "http://kqi.zoossoft.com/JS/LsJS.aspx?siteid=KQI10880110&float=1&lng=cn";
			}else{
				return "http://kqi.zoossoft.com/JS/LsJS.aspx?siteid=KQI10880110&float=1&lng=cn";
			}
		}
	}
public static function gettel() {
	$domain = $_SERVER["HTTP_HOST"];
	if (AppChannel::isChannelWX1($domain)){
		if(AppChannel::isDeviceM($domain)){
			return "021-52715099";
		}else{
			return "021-52715099";
		}
	}else if(AppChannel::isChannelWX2($domain)) {
		if(AppChannel::isDeviceM($domain)){
			return "021-52729299";
		}else{
			return "021-52729299";
		}
	}else if(AppChannel::isChannelPC($domain)) {
		if(AppChannel::isDeviceM($domain)){
			return "021-52370007";
		}else{
			return "021-52370007";
		}
	}else if(AppChannel::isChannelPC_SG($domain)) {
		if(AppChannel::isDeviceM($domain)){
			return "021-52669519";
		}else{
			return "021-52669519";
		}
	}
	else if(AppChannel::isChannel_SM($domain)) {
		if(AppChannel::isDeviceM($domain)){
			return "021-52669519";
		}else{
			return "021-52669519";
		}
	}
	}
}
AppChannel::init();


// var_dump(AppChannel::isDeviceM("3g.yyk.bestlong021.com"));
// var_dump(AppChannel::isDeviceM("58.sh9long.net"));


// var_dump(AppChannel::isDevicePC("3g.yyk.bestlong021.com"));
// var_dump(AppChannel::isDevicePC("58.sh9long.net"));


// var_dump(AppChannel::isChannel_SM("3g.yyk.bestlong021.com"));
// var_dump(AppChannel::isChannelPC_SG("58.sh9long.net"));

