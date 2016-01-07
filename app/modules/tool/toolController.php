<?php
/**
 * Date: 2015年12月29日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/tool/model.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/tool/view.php';
class toolController{
	/**
	 * 
	 * @var toolView
	 */
	private $view;
	/**
	 *
	 * @var toolModel
	 */
	private $model;
	public function __construct(){
		$this->model = new toolModel();
		$this->view = new toolView();
		if ($this->isPost()){
			$ctl = App::$router->getController();
			$pt = $_POST["name"];
			$path = FILE_SYSTEM_ENTRY.'/app/modules/'.$pt;
			if(is_dir($path)){
				$this->exitMsg('folder ['.$pt.'] exits');
			}
			mkdir($path);
			$str = file_get_contents('app/modules/tool/tpl/control.tpl');
			$c = strtr($str,array(
				"{date}"=>date("Y-m-d",time()),
				"{name}"=>$pt
			));
			file_put_contents($path.'/control.php', $c);
			
			$str = file_get_contents('app/modules/tool/tpl/model.tpl');
			$c = strtr($str,array(
					"{date}"=>date("Y-m-d",time()),
					"{name}"=>$pt
			));
			file_put_contents($path.'/model.php', $c);
			
			
			$str = file_get_contents('app/modules/tool/tpl/view.tpl');
			$c = strtr($str,array(
					"{date}"=>date("Y-m-d",time()),
					"{name}"=>$pt
			));
			file_put_contents($path.'/view.php', $c);
			$this->exitMsg('ok,<a href="/tool">continue</a>');
		}else{
			$content = $this->view->fetch('form');
			$this->view->hideHeader()->hideFooter()->wrap($content)->show();
		}
	}
	public function welcomeAction(){
		echo "hi";
	}
}