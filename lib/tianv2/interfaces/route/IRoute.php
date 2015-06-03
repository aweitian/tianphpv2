<?php
/**
 * @author awei.tian
 * date: 2013-9-1
 * 参考:
 */

interface IRoute{
	public function match($url_path,$matcher);
	/**
	 * 路由匹配成功就可以获取这个数组
	 * array(
			"preurl"=>array(),
			"module"=>"",
			"control"=>"",
			"action"=>"",
			"pathinfo"=>array()
		)
	 */
	/**
	 * @return urlManager
	 */
	public function getUrlManager();
}