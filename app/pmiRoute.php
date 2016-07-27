<?php
// 2014-3-13

/**
 * 路由的作用就是怎么看侍URL
 */
class pmiRoute implements IRoute {
	/**
	 *
	 * @var pmi
	 */
	private $pmi;
	private $tb;
	public function __construct() {
		$this->tb = require FILE_SYSTEM_ENTRY . "/app/conf/pmiRouteTable.php";
	}
	public function match($url_path) {
		foreach ($this->tb as $tb){
			$this->pmi = new pmi ( $url_path ,HTTP_ENTRY,$tb["moduleSkip"]);
			$m = $this->pmi->module;
			if (array_key_exists ( $m, $this->tb )){
				return true;
			}
		}
		return false;
	}
	public function route() {
		$m = $this->pmi->module;
		$path = $this->tb [$m] ["moduleLoc"];
		if (! file_exists ( $path )) {
			$this->_404 ();
		}
		$cls = $this->tb [$m] ["className"];
		require $path;
		if (! class_exists ( $cls )) {
			$this->_404 ();
		}
		new $cls ( $this->pmi->info );
	}
	private function _404() {
		$re = new httpResponse ();
		$re->_404 ();
	}
}
