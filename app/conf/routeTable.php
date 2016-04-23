<?php
/**
 * Date: 2016年4月11日
 * Author: Awei.tian
 * Description: pmcai路由规则配置表
 * 		把URL的HTTP_ENTRY部分和QUERYSTRING去掉,把剩下的拿来匹配
 * 
 * 
 * 
 * 		key为正则
 * 		val为mca,loc
 * 		匹配的字符串为url去掉HTTP_ENTRY,以/开头
 * 
 * 
 * 		优先级从上到下
 */


return array(
		"equal" => array(//强制路由,完全相等,一般用于解决CONTROL和MODULE冲突时使用

		),
		//正则匹配
		"regExp" => array(

		),
		//以什么开头 比如/priv能匹配/priv,/priv?a=b,/priv/a/b,不能匹配/privilege
		"startWith" => array(
			//				/db和/dbg是互不干扰的
// 			"/db" => array(
// 				"mca" => "mca",
// 				"loc" => FILE_SYSTEM_ENTRY."/debug"
// 			)
		),
		//其它
		"default" => array(
			"mca" => "ca",
			"loc" => FILE_SYSTEM_ENTRY."/app/modules"
		)
);


//示例


// return array(
// 	"equal" => array(//强制路由,完全相等,一般用于解决CONTROL和MODULE冲突时使用
// 		"/dbg/xx" => array(
// 			"mca" => "ca",
// 			"loc" => FILE_SYSTEM_ENTRY."/app/modules"
// 		)
// 	),
// 	//正则匹配
// 	"regExp" => array(
// 		"/dbg/l[a-z][a-z]" => array(
// 				"mca" => "mca",
// 				"loc" => FILE_SYSTEM_ENTRY."/debug/reg/cc"
// 		),
// 		"/dbg/k\d[a-z]" => array(/*/dbg/k\d\d matchs k11*/
// 				"mca" => "mca",
// 				"loc" => FILE_SYSTEM_ENTRY."/debug/reg/cc"
// 		)
// 	),
// 	//以什么开头
// 	"startWith" => array(
// 		"/dbg" => array(
// 			"mca" => "mca",
// 			"loc" => FILE_SYSTEM_ENTRY."/debug"
// 		)
	
	
// 	),
	
// 	//其它
// 	"default" => array(
// 		"mca" => "ca",
// 		"loc" => FILE_SYSTEM_ENTRY."/app/modules"
// 	)
// );