<?php
/**
 * Date: 2015年12月29日
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/modules/tool/toolModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/modules/tool/toolView.php';
class toolController implements IController{
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
	public static function _checkPrivilege(pmcaiMsg $msg,identityToken $it){
		return true;
	}
	public function __construct(){
		$this->model = new toolModel();
		$this->view = new toolView();
		
	}
	
	public function welcomeAction(pmcaiMsg $msg){
		if ($msg->isPost()){
			$ctl = $msg->getControl();
			$pt = $msg["name"];
			$path = FILE_SYSTEM_ENTRY.'/app/modules/'.$pt;
			if(is_dir($path)){
				exit('folder ['.$pt.'] exits');
			}
			mkdir($path);
			chmod($path, 0777);
			$str = file_get_contents('app/modules/tool/tpl/control.tpl');
			$c = strtr($str,array(
				"{date}"=>date("Y-m-d",time()),
				"{name}"=>$pt
			));
			file_put_contents($path.'/'.$pt.'Controller.php', $c);
			chmod($path.'/'.$pt.'Controller.php', 0777);
			
			$str = file_get_contents('app/modules/tool/tpl/model.tpl');
			$c = strtr($str,array(
				"{date}"=>date("Y-m-d",time()),
				"{name}"=>$pt
			));
			file_put_contents($path.'/'.$pt.'Model.php', $c);
			chmod($path.'/'.$pt.'Model.php', 0777);
			
			$str = file_get_contents('app/modules/tool/tpl/view.tpl');
			$c = strtr($str,array(
				"{date}"=>date("Y-m-d",time()),
				"{name}"=>$pt
			));
			file_put_contents($path.'/'.$pt.'View.php', $c);
			chmod($path.'/'.$pt.'View.php', 0777);
			
			exit('ok,<a href="/tool">continue</a>');
		}else{
			$this->view->show();
		}
	}
}