<?php
/**
 * Date: 2016-04-27
 * Author: Awei.tian
 * Description: 
 */
class treeView extends AppView{
	public function jsonOutput($arr,pmcaiMsg $msg){
		$var = $msg->getPmcaiUrl()->getInfo();
		
		if($var != "" && preg_match("/^\w+$/", $var)){
			print 'var ' . $var . ' = ';
		}
		
		print json_encode($arr);
		if($var != "" && preg_match("/^\w+$/", $var)){
			print ';';
		}
		exit;
	}
}