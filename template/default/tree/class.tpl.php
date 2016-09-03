<?php
/**
 * @Author: awei.tian
 * @Date: 2016年9月2日
 * @Desc: 
 * 依赖:
 */

echo "test";

$this->setBeforeResponseCallback(function($ui) {
	$ui->setLayout("base");
});

