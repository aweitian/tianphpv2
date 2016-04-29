<?php
/**
 * Date: 2016-04-26
 * Author: Awei.tian
 * Description: 
 */

class queryModel extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
	}
	public function test(){
		return "hi";
	}
	/**
	 * 
	 * @param int/array/string $period 0不限,array(t1,t2),
	 * 			一个DATE表示查询从0点到24点
	 * 			如果T1为DATE，转化为DATETIME为DATE 00：00：00
	 * 			如果T2为DATE，转化为DATETIME为DATE 23：59：59
	 * @param int $scope 不限0  渠道1  账户2  计划3  单元4
	 * @param array $scpath
	 * @param int $dev
	 * @param bool $grp 是否合并创意 true为合并
	 */
	public function query($period,$scope,$scpath,$dev,$grp){
		
	}
}