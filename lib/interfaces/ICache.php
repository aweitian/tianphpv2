<?php
/**
 * @author awei.tian
 * date: 2013-9-30
 * 说明:和KV不同的是，CACHE拥有生命周期
 * 这由cron定时清除
 */

interface ICache{
	/**
	 * 每次获取一次，把它的生命周期刷新一次
	 * @param string $key
	 * @return null or value
	 */
	public function get($key);
	/**
	 * @return this
	 * @param unknown $key
	 * @param unknown $val
	 * @param unknown $lifetime
	 */
	public function set($key,$val,$lifetime);
	public function delete($key);
	public function flush();
}