<?php
/**
 * Date: 2016年5月30日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class hosipitalFilterApi {
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/hosipital_filter.xml");
 	}
 	
	/**
	 * 
	 * KEY为MID,value为SID
	 * @param array $data
	 * @return rirResult      	
	 */
	public function search($data) {
		$sql = $this->sqlManager->getSql("/hosipital_filter/main");
		
		$hid = $this->sqlManager->getSql("/hosipital_filter/getHid/base");
		
		$count_mid = count($data);
		
		$where = array();
		$sw = $this->sqlManager->getSql("/hosipital_filter/getHid/where");
		
		$sc = $this->sqlManager->getSql("/hosipital_filter/cond_set");
		
		$i = 0;
		$bnd = array("count_mid" => $count_mid);
		foreach ($data as $mid => $nid){
			$cond_set = strtr($sc, array(
					":nid" => ":nid".$i,
					":mid" => ":mid".$i
			));
			$where[] = strtr($sw, array(":cond_set" => $cond_set));
		
			$bnd["nid".$i] = $nid;
			$bnd["mid".$i] = $mid;
			$i++;
		}
		
		$hid = strtr($hid, array(":where" => join(" OR ",$where)));
		
		$sql = strtr($sql,array(":getHid" => $hid));
		
		$ret = $this->db->fetchAll($sql, $bnd);
		
// 		var_dump($sql,$bnd);
		
		var_dump($ret);
		
	}
 }