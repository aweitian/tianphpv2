<?php
/**
 * Date: Apr 21, 2016
 * Author: Awei.tian
 * Description: 
 */
require 'debug.inc.php';

require_once FILE_SYSTEM_ENTRY . '/app/modules/loadData/csvFormat.php';
require_once FILE_SYSTEM_ENTRY . '/app/modules/loadData/csvFormatDetector.php';

$test = new csvFormatDetector(FILE_SYSTEM_ENTRY."/uploads/chuangyi计算机_20160328-20160328_134891.csv");
//$test = new csvFormatDetector(FILE_SYSTEM_ENTRY."/uploads/16年4月无线分析表-sh九龙06.csv");

$test->search();

if($test->match()){
	$r = new View();
	echo $r->utf8Header();
	if($test->getCsvType() == csvFormat::CSV_TYPE_PUB){
		$csv = $test->getCsvChananelFormat();
		echo $csv->getChananel();
		echo $csv->getCsvType();
	}else{
		$csv = $test->getCsvPrivFormat();
	}
	
	
}else{
	echo "failed";
}


