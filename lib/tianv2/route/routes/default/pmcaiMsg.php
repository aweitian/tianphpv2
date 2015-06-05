<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
require_once 'lib/tianv2/message/message.php';
class pmcaiMsg extends message{
	private $module;
	private $control;
	private $action;
	private $dispatch_times;
	
	public $dispatchStatus;
	
	private $_use_sys_control_not_found = false;
	public function __construct(httpRequest $request,$m,$c,$a){
		parent::__construct($request);
		$this->module = $m;
		$this->control = $c;
		$this->action = $a;
		$this->dispatch_times = 0;
	}
	
	public function getDispatchCount(){
		return $this->dispatch_times;
	}
	public function setDispatchCount($v){
		$this->dispatch_times = $v;
	}
	public function getModule(){
		return $this->module;
	}
	public function getClassName(){
		return $this->control;
	}
	public function getMethodName(){
		return $this->action;
	}
	
	public function getUseSysControlNotFound(){
		return $this->_use_sys_control_not_found;
	}
	public function setUseSysControlNotFound(){
		$this->_use_sys_control_not_found = true;
	}
	public function resetUseSysControlNotFound(){
		$this->_use_sys_control_not_found = false;
	}
}