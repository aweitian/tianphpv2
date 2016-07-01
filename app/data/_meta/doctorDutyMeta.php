<?php
class doctorDutyMeta {
	public static function getDay(){
		return array(
			"星期1",
			"星期2",
			"星期3",
			"星期4",
			"星期5",
			"星期6",
			"星期天"
		);		
	}
	public static function getDayStaus(){
		return array("不值班","特殊门诊","专家门诊","夜门诊");
	}
	public static function getDayNight(){
		return array("上午","下午","夜班");
	}
}
