<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class pmcaiMsg extends message{
	private $moduleLoc;
	private $module;
	private $control;
	private $action;
	private $dispatch_times;
	
	public $dispatchStatus;
	
	private $_use_sys_control_not_found = false;
	/**
	 * 
	 * @var pmcaiUrl
	 */
	private $url;
	public function __construct(httpRequest $request,pmcaiUrl $url){
		parent::__construct($request);
		$this->module = $url->getModule();
		$this->control = $url->getControl();
		$this->action = $url->getAction();
		$this->dispatch_times = 0;
		$this->moduleLoc = PMCAI_DISPATCHER_CNF_DEFAULT_MODULE_LOCATION;
		$this->url = $url;
	}
	/**
	 * @return pmcaiUrl
	 */
	public function getPmcaiUrl(){
		return $this->url;
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
	public function setModuleLoc($loc) {
		$this->moduleLoc = $loc;
	}
	public function getModuleLoc() {
		return $this->moduleLoc;
	}
	public function getControl(){
		return $this->control;
	}
	public function getAction(){
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