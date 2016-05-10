<?php
require_once FILE_SYSTEM_ENTRY.'/modules/oplog/opValidator.php';
class oplog{
	
	
	private $tb_prefix = "data_";
	private $tb_postfix = "oplog";
	/**
	 * 
	 * @var mysqlPdoBase
	 */
	private $db;
	
	
	public function __construct($tb_prefix=null) {
		if(is_string($tb_prefix)){
			$this->tb_prefix = $tb_prefix;
		}
		
		if (is_null(mysqlPdo::getConnection())) {
			tian::throwException("7399");
		}
		$this->db = new mysqlPdoBase();
	}
	public function getTabelName() {
		return $this->tb_prefix.$this->tb_postfix;
	}
	/**
	 * @return sid
	 */
	public function add($optype,$ipaddr){
		if(!opValidator::isValidOptype($optype)){
			tian::throwException("73c1");
		}
		$sid = $this->db->insert("insert into `".$this->getTabelName()."` (
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
		tian::newException($this->db->getErrorInfo(),$this->db->getErrorCode());
	}
	/**
	 * @return 返回影响的行数,删除小于指定日期的记录
	 * @param string $sid
	 * @throws Exception
	 */
	public function removeByDate($date){
		return $this->db->exec("DELETE FROM `".$this->getTabelName()."` WHERE `datetime`<:date", array(
				"date"=>$date
		));
	}
	public function update($sid){
		return $this->db->exec("update `".$this->getTabelName()."` set `opflag` = 0 WHERE `sid`=:sid", array(
				"sid"=>$sid
		));
	}
	/**
	 * 删除一个IP当天的记录
	 * @param string $ip
	 */
	public function removeByIp($ip){
		return $this->db->exec("DELETE FROM `".$this->getTabelName()."`
			WHERE `datetime`=:date and `ipaddr`=:ipaddr", array(
						"date"=>date("Y-m-d"),
						"ipaddr"=>$ip
				));
	}
	public function getCnt($optype,$ipaddr){
		$row = $this->db->fetch("select count(sid) as cnt from `".$this->getTabelName()."`
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