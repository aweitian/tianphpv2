<?php
//2014-3-13
require_once LIB_PATH."/mvc/route/routes/defaultRoute.php";

/**
 * 路由的作用就是怎么看侍URL
 */

class assetsRoute extends defaultRoute{
	public function __construct(){
		$p=str_repeat("p", count(explode("/", trim(ENTRY_HOME,"/"))));
		parent::__construct(ENTRY_HOME."/assets/[a-z0-9]+",$p."c");
	}
}
