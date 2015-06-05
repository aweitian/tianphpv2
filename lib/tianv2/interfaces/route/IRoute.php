<?php
/**
 * @author awei.tian
 * date: 2013-9-1
 * 参考:
 */

interface IRoute{
	/**
	 * @return bool
	 * @param string $url_path
	 */
	public function match($url_path);
}