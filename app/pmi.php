<?php

/**
 * @Author: awei.tian
 * @Date: 2016年7月26日
 * @Desc: 
 * 		把URL的M后面部分全部提取作为参数传递给模块的构造函数
 * 依赖:
 * 	\tian\url
 */
class pmi {
	private $http_entry;
	private $http_entry_len;
	/**
	 * 去掉HTTP_ENTRY的URL PATH部分
	 *
	 * @var string
	 */
	public $realpath = "";
	public $module = "";
	public $info = "";
	private $path;
	/**
	 *
	 * @param string $url
	 *        	完整路径
	 * @param string $http_entry
	 *        	入口路径
	 * @param int $moduleSkip
	 *        	模块目录长度
	 */
	public function __construct($url, $http_entry = "", $moduleSkip = 0) {
		if ($url) {
			$url = new url ( $url );
			$this->path = $url->path;
			$this->http_entry = $http_entry;
			$this->http_entry_len = strlen ( $this->http_entry );
			if ($this->http_entry_len && substr ( $this->path, 0, $this->http_entry_len ) == $this->http_entry) {
				$this->realpath = substr ( $this->path, $this->http_entry_len );
				if ($this->realpath === false) {
					$this->realpath = "";
				}
			} else {
				$this->realpath = $this->path;
			}
			if ($moduleSkip > 0) {
				$tmp = explode ( "/", trim ( $this->realpath, "/" ), $moduleSkip + 1 );
				if (count ( $tmp ) > $moduleSkip) {
					$this->info = array_pop ( $tmp );
					$this->module = join ( "/", $tmp );
				} else {
					$this->module = trim ( $this->realpath, "/" );
					$this->info = "";
				}
			} else {
				$this->module = "";
				$this->info = $this->realpath;
			}
		}
	}
}