<?php
// $control_suffix = $this->msg->getClassName().$this->conf["ControlSuffix"];
// $controlLoc = tian::getModulePath($this->msg->getModule());
// $controlLoc = $controlLoc.'/'.$control_suffix.".php";
/**
 * @author awei.tian
 * date: 2013-9-17
 * 说明:
 * 		只能派遣PMCAI MSG
 * 		PMCAI MSG中包含MODULE LOC
 * 		根据MODULE LOC + CONTROLLER + ACTIONER + .PHP
 * 		查找相应文件是否存在
 * 		
 */
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IDispatcher.php';
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IController.php';
require_once FILE_SYSTEM_ENTRY.'/lib/interfaces/route/IActionNotFound.php';

class pmcaiDispatcher implements IDispatcher{
	
	const DISPATCH_STATE_INIT				= 0xa1;
	const DISPATCH_STATE_RESTART    		= 0xb2;
	const DISPATCH_STATE_DISPATCHING 		= 0xc3;
	const DISPATCH_STATE_CONTROL_NOT_FOUND 	= 0xd4;
	const DISPATCH_STATE_ACTION_NOT_FOUND 	= 0xe5;
	const DISPATCH_STATE_DISPATCH_OK 		= 0xf6;
	const DISPATCH_STATE_DISPATCH_FAIL 		= 0xf7;
	const DISPATCH_STATE_EXCEED_MAX_TIMES 	= 0xfc;
	
	const MAX_COUNT_MSG_DISPATCH 			= 5;
	/**
	 * 此消息派遣是否成功
	 * @var $_state
	 */
	protected $_state = false;
	/**
	 * 
	 * @var pmcaiMsg
	 */
	protected $msg;
	protected $_message = "";
	protected $traces = array();
	protected $_control_inst = null;

	protected $conf;
	
	
	private $IActionNotFoundMethodName = "_action_not_found";
	private $IControllerMethodName = "_checkPrivilege";
	public function __construct(){
		
	}
	private function init(pmcaiMsg $msg) {
		$this->msg = $msg;
		$this->msg->dispatchStatus = self::DISPATCH_STATE_INIT;
		$path = FILE_SYSTEM_ENTRY."/app/conf/dispatch.php";
		if(file_exists($path)){
			$conf = require $path;
			$this->conf = $conf;
			return ;
		}
		$this->conf = $this->defaultConf();
	}
	public function defaultConf(){
		return array(
			"controlNotFound" => PMCAI_DISPATCHER_CNF_CONTROL_NOT_FOUND,
			"defaultModuleLocation" => $this->msg->getModuleLoc(),
			"ActionSuffix" => PMCAI_DISPATCHER_CNF_ACTION_SUFFIX,
			"ControlSuffix" => PMCAI_DISPATCHER_CNF_CONTROL_SUFFIX,
		);
	}
	/**
	 * 返回是否派遣成功
	 */
	public function dispatch($msg){
		$this->init($msg);
		while ($this->doDispatch()===false);
// 		var_dump("======".$this->msg->dispatchStatus,$this->getDispatchResult(),$this->_state,"==========") ;
// 		echo "<br>";
		return $this->getDispatchResult()===self::DISPATCH_STATE_DISPATCH_OK;
	}
	/**
	 * 返回TRUE，结束派遣
	 * @return boolean
	 * 根据msg的mca
	 * 如果C不存在，它实现了iControlNotFound，就把$msg传递给它的hook404方法
	 * 如果没有实现，就fail()
	 * 如果方法存在，派遣成功
	 * 如果不存在，但它实现了iActionNotFound,调用 _action_not_found
	 * 派遣结束
	 * 没有实现iActionNotFound，
	 * 404
	 */
	protected function doDispatch(){
		$times = $this->msg->getDispatchCount();
		if($times > self::MAX_COUNT_MSG_DISPATCH){
			$this->traces[] = "diapatch://exceed the Max limit,dispatch end";
			$this->exceed_max_times();
		}else{
			$this->msg->setDispatchCount($times+1);
		}
		if($this->msg->getUseSysControlNotFound()){
			$this->_dispatch_Sys_control_not_found();
			$this->traces[] = "dispatching://dispatch end";
			return true;
		}
		$state = $this->msg->dispatchStatus;
// 		var_dump("????".($state));echo "<br>";
		switch ($state){
			case self::DISPATCH_STATE_INIT:
			case self::DISPATCH_STATE_RESTART:
				$this->msg->dispatchStatus = self::DISPATCH_STATE_DISPATCHING;
				$this->_Dispatch();
				return false;
			case self::DISPATCH_STATE_DISPATCHING:
				$this->_state = $state;
				return true;
			case self::DISPATCH_STATE_CONTROL_NOT_FOUND:
				$this->_state = $state;
				return true;
			case self::DISPATCH_STATE_ACTION_NOT_FOUND:
				$this->_state = $state;
				return true;
			case self::DISPATCH_STATE_DISPATCH_OK:
				$this->_state = $state;
				return true;
			case self::DISPATCH_STATE_DISPATCH_FAIL:
				$this->_state = $state;
				return true;
			case self::DISPATCH_STATE_EXCEED_MAX_TIMES:
				$this->_state = $state;
				return true;
		}
	}
	protected function ok(){
		$this->msg->dispatchStatus = self::DISPATCH_STATE_DISPATCH_OK;
		$this->_state = self::DISPATCH_STATE_DISPATCH_OK;
	}
	protected function fail($msg){
		$this->msg->dispatchStatus = self::DISPATCH_STATE_DISPATCH_FAIL;
		$this->_message = $msg;
		$this->_state = false;
	}
	protected function control_not_found(){
		$this->msg->dispatchStatus = self::DISPATCH_STATE_CONTROL_NOT_FOUND;
	}
	protected function action_not_found(){
		$this->msg->dispatchStatus = self::DISPATCH_STATE_ACTION_NOT_FOUND;
	}
	protected function restart(){
		$this->msg->dispatchStatus = self::DISPATCH_STATE_RESTART;
	}
	protected function exceed_max_times(){
		$this->msg->dispatchStatus = self::DISPATCH_STATE_EXCEED_MAX_TIMES;
	}
	protected function getDispatchResult(){
		$state = $this->msg->dispatchStatus;
// 		var_dump("+++".$state,$this->_state,"+++");echo "<br>";
		switch ($state){
			case self::DISPATCH_STATE_INIT:
			case self::DISPATCH_STATE_RESTART:
				$this->_message = "dispatcherException.dispatch_state_init";
				break;
			case self::DISPATCH_STATE_DISPATCHING:
				$this->_message = "dispatcherException.dispatch_state_dispatching";
				break;
			case self::DISPATCH_STATE_CONTROL_NOT_FOUND:
				$this->_message = "dispatcherException.dispatch_state_control_not_found";
				break;
			case self::DISPATCH_STATE_ACTION_NOT_FOUND:
				$this->_message = "dispatcherException.dispatch_state_action_not_found";
				break;
			case self::DISPATCH_STATE_DISPATCH_OK:
				$this->_message = "dispatcherException.dispatch_state_dispatch_ok";
				break;
			case self::DISPATCH_STATE_EXCEED_MAX_TIMES:
				$this->_message = "dispatcherException.exceed_max_times";
				break;
		}
		return $this->_state;
	}
	/**
	 * 先调用下getDispatchResult()
	 * @return string
	 */
	public function getDispatchResultInfo(){
		return $this->_message;
	}
	public function appendDebugInfo(){
		foreach ($this->traces as $item){
			debug::d($item);
		}
	}

	
	/**
	 * 执行逻辑:
	 * 根据moduleloc/module/control看controlController的文件名是否存在（这样也点好处，比如在包含control类之前还想包含点别的，这时就可以进行）
	 * 存在包含，检查类是否存在，存在，有没有实现ICONTROL，没有调用FAIL（）。
	 * 实现了，初始化
	 * 如果类不存在的话，看有没有类controlNotFound,并且它要实现iControlNotFound
	 * 实现先调用zzzSysDefinedRewriteMessage（$msg）
	 * 然后调用restart()
	 * 没有没有实现iControlNotFound
	 * 调用FAIL（）。
	 */
	protected function _Dispatch(){
// 		exit("test");
		$control_suffix = $this->msg->getControl().$this->conf["ControlSuffix"];
		$controlLoc = $this->msg->getModuleLoc();
		$controlLoc = $controlLoc.'/'.$this->msg->getControl()."/".$control_suffix.".php";
		$this->traces[] = "dispatching://prepare to check class exists named $control_suffix";
		if(!class_exists($control_suffix)){
			$this->traces[] = "dispatching://class not found,finding file in $controlLoc";
			if(file_exists($controlLoc)){
				$this->traces[] = "dispatching://control file found, require the control file at $controlLoc";
				require_once($controlLoc);
			}
			$this->traces[] = "dispatching://recheck class exists";
			if (!class_exists($control_suffix)){
				$this->traces[] = "dispatching://trigger control not exist";
				$this->_dispatch_control_not_exist();
			}else{
				$this->traces[] = "dispatching://trigger control exist";
				$this->_dispatch_control_exist();
			}
// 			exit("ccc");
		}else{
			$this->traces[]="dispatching://trigger control exist";
			$this->_dispatch_control_exist();
		}
	}
	protected function _dispatch_control_exist(){
		$this->traces[] = "dispatching://init control class";
		$rc = new ReflectionClass($this->msg->getControl().$this->conf["ControlSuffix"]);
		$this->traces[] = "dispatching://check control implements the iController interface";
		if ($rc->implementsInterface('IController')) {
			$this->traces[] = "dispatching://control implemented the iController interface";
			//权限检查
			$controller = $this->msg->getControl().$this->conf["ControlSuffix"];
			if (!$rc->hasMethod($this->IControllerMethodName) or !$rc->getMethod($this->IControllerMethodName)->isStatic()) {
				$this->traces[] = "dispatching://controller not function ".$this->IControllerMethodName;
				return true;
			}
			$privilege = call_user_func_array(
				$controller."::".$this->IControllerMethodName, 
				array(
					$this->msg,
					identityToken::getInstance()
				)
			);
			$this->traces[] = "dispatching://execute the check privilege function";
			if($privilege !== true){
				$this->traces[] = "dispatching://blocked by the privilege check";
				tian::throwException("7390");
				return false;
			}else{
				$this->traces[] = "dispatching://pass the privilege check";
				$action = $this->msg->getAction();
				$action_suffix = $action.$this->conf["ActionSuffix"];
				$this->traces[] = "dispatching://assign the action:$action_suffix";
				//action存在
				$this->traces[] = "dispatching://check action exists";
				
				if($rc->hasMethod($action_suffix)){
					$this->traces[] = "dispatching://action found,and invoked,dispatch end.";
					$controller = $rc->newInstance();
					$method = $rc->getMethod($action_suffix);
					$method->invokeArgs($controller, array($this->msg));
					$this->ok();
				//ACTION不存在，但实现了iActionNotFound接口
				}elseif ($rc->implementsInterface("IActionNotFound")){
					$this->traces[] = "dispatching://action not found,but the control immplements the IActionNotFound interface";
					$action = $this->IActionNotFoundMethodName;
					$this->traces[] = "dispatching://action is assigned to $action";
					$controller = $rc->newInstance();
					$method = $rc->getMethod($action);
					$method->invokeArgs($controller, array($this->msg));
					$this->ok();
					$this->traces[] = "dispatching://invoked the actionNotFound action,dispatch end.";
				}else{
					$this->traces[] = "dispatching://action not found,and the control no implemtns the IActionNotFound interface,dispatch end";
					$this->fail("dispatcherException.dispatch_state_action_not_found");
				}
			}

		}else{
			$this->traces[] = "dispatching://the class have not implements iController interfaces,dispatch end";
			$this->fail("dispatcherException.control_does_not_implements_icontroller");
		}
	}
	protected function _dispatch_control_not_exist(){
		$this->traces[] = "dispatching://control not exist";
		$this->msg->setUseSysControlNotFound();
		$this->restart();
	}
	protected function _dispatch_Sys_control_not_found(){
		$control = $this->conf["controlNotFound"];
		$this->traces[] = "dispatching://hook 404,the control name is $control";
		if(!class_exists($control)){
			$this->traces[] = "dispatching://control name $control not included manually";
			$this->msg->resetUseSysControlNotFound();
// 			tian::throwException("7397");
			return false;
		}
		$this->traces[] = "dispatching://$control class found,checking interface IControlNotFound";
		$rc = new ReflectionClass($control);
		if ($rc->implementsInterface('IControlNotFound')) {
			$this->traces[] = "dispatching://control name $control implements icontroller interface";
			$controller = $rc->newInstance();
			$method=$rc->getMethod("_control_not_found");
			$method->invokeArgs($controller, array($this->msg));
			$this->ok();
			$this->traces[] = "dispatching://invoke the hook404,dispatch end";
			return true;
		}else{
			$this->traces[] = "dispatching://control name $control dese not implements IControlNotFound interface,dispatch end";
// 			tian::throwException("7398");
			
			$this->fail("wrong class ".$control);
			return false;
		}
		
	}
}