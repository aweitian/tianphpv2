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
}