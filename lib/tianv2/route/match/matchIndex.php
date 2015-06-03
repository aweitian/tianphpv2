<?php
/**
 * @author awei.tian
 * date: 2013-9-16
 * 说明:把正则匹配的按PMCA指定顺序映射过去
 */
class matchIndex implements IMatch{
	private $pmca;
	public function __construct($pmca="ca"){
		if(!pmcai::isValidPmcaiMask($pmca)){
			throw new pmcaiException(null,pmcaiException::INVALID_MASKSTRING);
		}
		$this->pmca=$pmca;
	}
	public function getPmcai($matches){
		if(!is_array($matches))return pmcai::getEmptyPmcai();
		array_shift($matches);/* var_dump($this->pmca); */
		return pmcai::getPmcai($matches, $this->pmca);
	}
}