<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月20日
 * @Desc: 用户提交的数据到前台显示前过滤
 * 依赖:
 */
class AppFilter {
	/**
	 * 用户数据输出时过滤
	 * @param string $html
	 * @return string
	 */
	public static function filterOut($html){
		return htmlspecialchars($html,ENT_QUOTES);
	}
	/**
	 * 用户数据输入时过滤
	 * @param string $html
	 * @return string
	 */
	public static function filterIn($html){
		return trim(strip_tags($html));
	}
	/**
	 * 替换商务通和电话的点位符
	 * @param string $html
	 * @return string
	 */
	public static function RePlaceholder($content){
		return strtr($content,array(
			"http://swt" => AppChannel::getSwt(),	
			"http://tel" => AppChannel::getTel(),	
		));
	}
}