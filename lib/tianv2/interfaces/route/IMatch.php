<?php
/**
 * @author awei.tian
 * date: 2013-9-13
 * 说明:
 */
interface IMatch{
	/**
	 * @param array $url_matches preg_matches的第三个参数
	 * 返回一个数组,pmcai可以为空
	 */
	function getPmcai($url_matches);
}