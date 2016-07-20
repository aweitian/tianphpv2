<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月20日
 * @Desc: 用户提交的数据到前台显示前过滤
 * 依赖:
 */
class AppFilter {
	public static function filter($html){
		return htmlspecialchars($html,ENT_QUOTES);
	}
}