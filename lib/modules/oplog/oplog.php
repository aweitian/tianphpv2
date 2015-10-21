<?php
require_once "lib/tianv2/interfaces/IInstall.php";
require_once 'lib/modules/oplog/opValidator.php';
class oplog implements IInstall{
	
	
	private $tb_postfix = "oplog";
	
	
	
	public function __construct() {
		if (is_null(tian::$pdoBase)) {
			tian::throwException("7399");
		}
		
	}
	public function install() {
		$sql = file_get_contents("lib/modules/oplog/install.sql");
		$sql = str_replace("xxxx_oplog",$this->getTabelName(),$sql);
		tian::$pdoBase->exec($sql, array());
	}
	public function uninstall() {
		$sql = file_get_contents("lib/modules/oplog/uninstall.sql");
		$sql = str_replace("xxxx_oplog",$this->getTabelName(),$sql);
		tian::$pdoBase->exec($sql, array());
	}
	public function getTabelName() {
		return  TABLE_PREFIX."_".$this->tb_postfix;
	}
	/**
	 * @return sid
	 */
	public function add($optype,$ipaddr){
		if(!opValidator::isValidOptype($optype)){
			tian::throwException("73c1");
		}
		$sid = tian::$pdoBase->insert("insert into `".$this->getTabelName()."` (
			`optype`,`ipaddr`,`date`
		) values (
			:optype,:ipaddr,:date
		)",array(
					"optype"=>$optype,
					"ipaddr"=>$ipaddr,
					"date"=>date("Y-m-d"),
			));
		if($sid>0){
			return $sid;
		}
		$info = tian::$pdoBase->getErrorInfo();
		tian::newException($info[2],$info[0]);
	}
	/**
	 * @return 返回影响的行数,删除小于指定日期的记录
	 * @param string $sid
	 * @throws Exception
	 */
	public function removeByDate($date){
		return tian::$pdoBase->exec("DELETE FROM `".$this->getTabelName()."` WHERE `datetime`<:date", array(
				"date"=>$date
		));
	}
	public function update($sid){
		return tian::$pdoBase->exec("update `".$this->getTabelName()."` set `opflag` = 0 WHERE `sid`=:sid", array(
				"sid"=>$sid
		));
	}
	/**
	 * 删除一个IP当天的记录
	 * @param string $ip
	 */
	public function removeByIp($ip){
		return tian::$pdoBase->exec("DELETE FROM `".$this->getTabelName()."`
			WHERE `datetime`=:date and `ipaddr`=:ipaddr", array(
						"date"=>date("Y-m-d"),
						"ipaddr"=>$ip
				));
	}
	public function getCnt($optype,$ipaddr){
		$row = tian::$pdoBase->fetch("select count(sid) as cnt from `".$this->getTabelName()."`
				where
				`ipaddr` = :ipaddr and `optype`= :optype and `date`=:date and `opflag` = 0
		", array(
					'optype'=>$optype,
					'ipaddr'=>$ipaddr,
					'date'=>date("Y-m-d")
			));
		return $row["cnt"];
	}
}