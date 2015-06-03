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
		$conf_path = ENTRY_PATH."/conf/runEnvirFactory.ini";
		if(file_exists($conf_path)){
			$c = file_get_contents($conf_path);
			if($c == "default"){
				$this->name = "default";
			}else{
				$path = ENTRY_PATH."/app/runEnvir/".$c."/runEnvir.php";
				if(!file_exists($path)){
					tian::throwException("7391");
					return;
				}else{
					$this->name = $c;
					require_once $path;
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