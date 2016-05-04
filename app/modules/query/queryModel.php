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
		$this->initSqlManager("data");
	}
	public function test(){
		return "hi";
	}
	/**
	 * 
	 * @param qArgs $q
	 */
	public function query(qArgs $q){
		
		
		//FIELDS
		if($q->getGrpIdea()){
			$prd = $this->sqlManager->getSql("/sql/query/fields/private_data_grp");
			$pud = $this->sqlManager->getSql("/sql/query/fields/public_data_grp");
		}else{
			$prd = $this->sqlManager->getSql("/sql/query/fields/private_data");
			$pud = $this->sqlManager->getSql("/sql/query/fields/public_data");
		}
		$fields = $pud . "," . $prd;
		switch($q->getLevel()){
			case qArgs::LVL_ALL:
				break;
			
			case qArgs::LVL_CHANNEL:
				$fields = $this->sqlManager->getSql("/sql/query/fields/channel") . "," . $fields;
				break;
				
			case qArgs::LVL_ACCOUNT:
				$fields = $this->sqlManager->getSql("/sql/query/fields/account") . "," . $fields;
				break;
				
			case qArgs::LVL_PLAN:
				$fields = $this->sqlManager->getSql("/sql/query/fields/plan") . "," . $fields;
				break;
				
			case qArgs::LVL_UNIT:
				$fields = $this->sqlManager->getSql("/sql/query/fields/unit") . "," . $fields;
				break;
			
			default:
				return false;
		}
		
		//TABLE
		$table = $this->sqlManager->getSql("/sql/query/table_tree");
		
		
		//JOIN
		$join = $this->sqlManager->getSql("/sql/query/join/public_data");
		switch ($q->getDev()){
			case qArgs::DEV_ALL:
				$join .= $this->sqlManager->getSql("/sql/query/join/private_data/all");
				break;
			case qArgs::DEV_PC:
				$join .= $this->sqlManager->getSql("/sql/query/join/private_data/pc");
				break;
			case qArgs::DEV_M:
				$join .= $this->sqlManager->getSql("/sql/query/join/private_data/m");
				break;
			default:
				return false;
		}
		
		
		
		
		
		//WHERE
		$where = "";
		
		#####	where-timespan
		if($q->getSpanValid()){
			$where = $this->sqlManager->getSql("/sql/query/where/span_pub_date") 
			. " AND " 
			. $this->sqlManager->getSql("/sql/query/where/span_priv_data");
		}
		#####	where level		
		switch($q->getLevel()){
			case qArgs::LVL_ALL:
				break;
					
			case qArgs::LVL_CHANNEL:
				$where = $this->sqlManager->getSql("/sql/query/where/channel") . " AND " . $where;
				break;
		
			case qArgs::LVL_ACCOUNT:
				$where = $this->sqlManager->getSql("/sql/query/where/account") . " AND " . $where;
				break;
		
			case qArgs::LVL_PLAN:
				$where = $this->sqlManager->getSql("/sql/query/where/plan") . " AND " . $where;
				break;
		
			case qArgs::LVL_UNIT:
				$where = $this->sqlManager->getSql("/sql/query/where/unit") . " AND " . $where;
				break;
					
			default:
				return false;
		}
		if(trim($where) == ""){
			$where = " 1 ";
		}
		
		#####	where dev
		switch ($q->getDev()){
			case qArgs::DEV_ALL:
				break;
			case qArgs::DEV_PC:
				$where = $this->sqlManager->getSql("/sql/query/where/dev_pc") . " AND " . $where;;
				break;
			case qArgs::DEV_M:
				$where = $this->sqlManager->getSql("/sql/query/where/dev_m") . " AND " . $where;;
				break;
			default:return false;
		}
		
		
		//GROUP BY
		$grp = "";
		if($q->getGrpIdea()){
			switch($q->getLevel()){
				case qArgs::LVL_ALL:
					
					break;
						
				case qArgs::LVL_CHANNEL:
					$grp = $this->sqlManager->getSql("/sql/query/groupby/channel");
					break;
			
				case qArgs::LVL_ACCOUNT:
					$grp = $this->sqlManager->getSql("/sql/query/groupby/account");
					break;
			
				case qArgs::LVL_PLAN:
					$grp = $this->sqlManager->getSql("/sql/query/groupby/plan");
					break;
			
				case qArgs::LVL_UNIT:
					$grp = $this->sqlManager->getSql("/sql/query/groupby/unit");
					break;
						
				default:
					return false;
			}
		}
		//SQL BASE
		if($q->getGrpIdea() && $q->getLevel() != qArgs::LVL_ALL){
			$sql = $this->sqlManager->getSql("/sql/query/base_grp");
			$sql = strtr($sql,array(
				"@fields" => $fields,
				"@table"  => $table,
				"@join"   => $join,
				"@where"  => $where,
				"@grp"    => $grp
			));
		}else{
			$sql = $this->sqlManager->getSql("/sql/query/base");
			$sql = strtr($sql,array(
				"@fields" => $fields,
				"@table"  => $table,
				"@join"   => $join,
				"@where"  => $where
			));
		}
		
		return strtr($sql,array("@table_tree" => "table_tree"));
	}
}