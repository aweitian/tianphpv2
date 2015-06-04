<?php
/**
 * @author awei.tian
 * date: 2013-9-18
 * 说明:相对于入口目录
 */
return array(
	"controlNotFound"=>"hook404",/*需要手动加载，这是一个类名,要实现iControlNotFound接口*/
	"defaultModuleLocation"=>"/app/controllers",
	"defaultControl"=>"main",
	"defaultAction"=>"welcome",
	"defaultControlRegExp"=>'[^\w]',
	"defaultActionRegExp"=>'^[^\w]',
	"ActionSuffix"=>'Action',
	"ControlSuffix"=>'Controller',
);