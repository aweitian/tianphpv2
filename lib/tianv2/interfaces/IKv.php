<?php
/**
 * @author awei.tian
 * date: 2013-9-23
 * 说明:
 */
interface IKv{
	/**
	 * @return bool
	 * @param string $key
	 * @param mix $value
	 */
	function set($key,$value);
	/**
	 * @return 成功返回value值，失败返回false
	 * @param string $key
	 */
	function get($key);
	/**
	 * @return bool
	 * @param unknown $key
	 */
	function delete($key);
}