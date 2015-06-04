<?php
/**
 * @author awei.tian
 * date: 2013-9-16
 * 说明:把正则匹配的按PMCA指定顺序映射过去
 */
require_once 'lib/tianv2/interfaces/route/IMatch.php';
require_once 'lib/tianv2/route/match/pmcaiUtil.php';
class matchIndex implements IMatch{
	private $pmca;
	public function __construct($pmca="ca"){
		if(!pmcaiUtil::isValidPmcaiMask($pmca)){
			tian::throwException("73a0");
			return;
		}
		$this->pmca=$pmca;
	}
	public function getPmcai($matches){
		if(!is_array($matches))return pmcaiUtil::getEmptyPmcai();
		array_shift($matches);/* var_dump($this->pmca); */
		return pmcaiUtil::getPmcai($matches, $this->pmca);
	}
}