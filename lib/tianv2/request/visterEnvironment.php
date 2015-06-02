<?php
/**
 * @author:awei.tian
 * @date:2014-1-17
 * @functions:
 */
class visterEnvironment{
	const VISTER_EINVIRONMENT_DEVICE_TYPE_PC=0;
	const VISTER_EINVIRONMENT_DEVICE_TYPE_MOBILE=1;
	const VISTER_EINVIRONMENT_DEVICE_TYPE_TABLELET=2;
	/**
	 * 返回访问者使用的设备
	 */
	public function getDeviceType(){
		return self::VISTER_EINVIRONMENT_DEVICE_TYPE_PC;
	}
	
	const VISTER_EINVIRONMENT_LOCAL_DOMESTIC=0;
	const VISTER_EINVIRONMENT_LOCAL_FOREIGN=1;
	/**
	 * 返回访问者的区域
	 */
	public function getLocal(){
		return self::VISTER_EINVIRONMENT_LOCAL_DOMESTIC;
	}
	
}