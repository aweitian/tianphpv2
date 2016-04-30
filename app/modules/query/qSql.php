<?php
/**
 * Date: Apr 30, 2016
 * Author: Awei.tian
 * Description: 
 */
class qSql{
	/**
	 * @var qArgs
	 */
	private $arg;
	
	/**
	 * 
	 * @var sqlManager $sm
	 */
	private $sm;
	
	/**
	 * 
	 * @var mysqlPdoBase
	 */
	private $db;
	public function __construct(qArgs $a){
		$this->arg = $a;
		$this->sm = new sqlManager("data");
		$this->db = new mysqlPdoBase();
	}

// 	/**
// 	 * 检查有没有这个频道，有返回ID，没有返回0
// 	 * @param string $chv
// 	 */
// 	private function getChananelId($chv){
// 		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_channel/getRow"), array(
// 				"ch_val" => $chv,
// 		));
// 		if(empty($data)){
// 			return 0;
// 		}else{
// 			return $data["ch_id"];
// 		}
// 	}
// 	/**
// 	 * 检查有没有这个帐号，有返回ID，没有返回0
// 	 * @param int $ch
// 	 * @param string $acc
// 	 * @param pc/mobile $dev
// 	 * @return int account_id
// 	 */
// 	private function getAccountId($ch,$acc){
// 		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_account/getRow"), array(
// 				"ch_id" => $ch,
// 				"ac_val" => $acc,
// 		));
// 		if(empty($data)){
// 			return 0;
// 		}else{
// 			return $data["ac_id"];
// 		}
// 	}
// 	/**
// 	 * 有返回ID，没有返回0
// 	 * @param int $acid
// 	 * @param string $plv
// 	 * @return int plan id
// 	 */
// 	private function getPlanId($acid,$plv){
// 		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_plan/getRow"), array(
// 				"ac_id" => $acid,
// 				"pl_val" => $plv,
// 		));
// 		if(empty($data)){
// 			return 0;
// 		}else{
// 			return $data["pl_id"];
// 		}
// 	}
// 	/**
// 	 * 有返回ID，没有返回0
// 	 * @param int $plid
// 	 * @param string $uv
// 	 * @return int unit id
// 	 */
// 	private function getUnitId($plid,$uv){
// 		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_unit/getRow"), array(
// 				"pl_id" => $plid,
// 				"un_val" => $uv,
// 		));
// 		if(empty($data)){
// 			return 0;
// 		}else{
// 			return $data["un_id"];
// 		}
// 	}	
	public function getSql(){
		
	}
}