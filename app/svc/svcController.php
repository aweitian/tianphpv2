<?php
/**
 * Date:2015年6月5日
 * Author:Awei.tian
 * Function:
 */
class svcController{
	public function __construct(svcMsg $msg){
		echo $msg->getName();
	}
}