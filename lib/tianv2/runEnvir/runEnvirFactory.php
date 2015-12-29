<?php
/**
 * Date:2015年6月2日
 * Author:Awei.tian
 * Function:
 */
class runEnvirFactory{
	private static $_inst = null;
	private $name;
	/**
	 * @var runEnvir
	 */
	public $runEnvir;
	private function __construct(){
		$conf_path = FILESYSTEM_ENTRY_POINT."/app/conf/runEnvirFactory.php";
		if(file_exists($conf_path)){
			$c = require_once ($conf_path);
			if($c == "default"){
				$this->name = "default";
			}else{
				$path = FILESYSTEM_ENTRY_POINT."/app/runEnvir/".$c."/runEnvir.php";
				if(!file_exists($path)){
					tian::throwException("7391");
					return;
				}else{
					$this->name = $c;
					require_once $path;
					$this->runEnvir = new runEnvir();
					return;
				}
			}
		}
		require_once 'lib/tianv2/runEnvir/default/runEnvir.php';
		$this->runEnvir = new runEnvir();
	}
	public static function getInstance(){
		if(is_null(self::$_inst)){
			self::$_inst = new self();
		}
		return self::$_inst;
	}
}