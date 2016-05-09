<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 * 		Specail for pmcai view
 */
class AppView extends View{
	/**
	 * 
	 * @var pmcaiMsg $pmcaiMsg
	 */
	protected $pmcaiMsg;
	
	public function __construct(){
		
	}
	
	public function setPmcaiMsg(pmcaiMsg $msg){
		$this->pmcaiMsg = $msg;
	}
	
	public function fetch($tpl,$data=array(),$ext='.tpl.php'){
		if(is_null($this->pmcaiMsg)){
			tian::throwException(0x0000);
		}
		$ctl = $this->pmcaiMsg->getControl();
		ob_start();
		if(strpos($tpl,'/') !== 0){
			$tpl = FILE_SYSTEM_ENTRY.$this->pmcaiMsg->getModuleLoc()."/".$ctl."/tpl/".$tpl.$ext;
				
		}
		include $tpl;
		$ret = ob_get_contents();
		ob_end_clean();
		return $ret;
	}
	
}