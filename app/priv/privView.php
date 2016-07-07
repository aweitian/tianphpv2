<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 * 		Specail for pmcai view
 */
require_once FILE_SYSTEM_ENTRY."/template/priv/privUI.php";

class privView extends AppView{
// 	/**
// 	 *
// 	 * @var priv
// 	 */
// 	protected $priv;
// 	protected function getUserInfo(){
// 		$this->priv = new priv(App::getSession());
// 		return $this->priv->getUserInfo();
// 	}
	public function info($title,$info){
		$tpl = dirname(__FILE__)."/info.tpl.php";
		ob_start();
		include $tpl;
		$body = ob_get_contents();
		ob_end_clean();
		return $body;
	}
	public function priv_wrap($userInfo,$content){
		$tpl = "template/priv/body.php";
		ob_start();
		include $tpl;
		$body = ob_get_contents();
		ob_end_clean();
		return View::wrap($body,"template/priv/layout.php");
	}
}