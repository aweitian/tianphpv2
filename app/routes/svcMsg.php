<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class svcMsg extends message{
	private $name;
	public function __construct(httpRequest $request,$svcName){
		$this->name = $svcName;
		parent::__construct($request);
	}
	public function getName(){
		return $this->name;
	}
}