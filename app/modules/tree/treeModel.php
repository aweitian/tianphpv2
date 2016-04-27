<?php
/**
 * Date: 2016-04-27
 * Author: Awei.tian
 * Description: 
 */
class treeModel extends AppModel{
	public function __construct(){
		parent::__construct();
		$this->initDb();
		$this->initSqlManager("data");
	}
	/***
	 * 返回森林
	 * 树的格式为array(data=>'',children=>'')
	 */
	public function channel(){
		$root_forst = array();
		$sql = $this->sqlManager->getSql("/sql/data_channel/getRows");
		$bnd = array();
		$data = $this->db->fetchAll($sql, $bnd);
		foreach ($data as $item){
			$tree_key = $item["ch_val"];
			$tree_val = array(
				"data" => array(
					"ch_id" => $item["ch_id"]
				),
				"children" => array(
						
				)
			);
			$root_forst[$tree_key] = $tree_val;
		}
		return $root_forst;
	}
	
	/***
	 * 返回森林
	 * 树的格式为array(data=>'',children=>'')
	 */
	public function account(){
		$root_forst = $this->channel();
		$sql = $this->sqlManager->getSql("/sql/data_account/getRowsByChId");
		foreach ($root_forst as &$chl){
			$bnd = array("ch_id" => $chl["data"]["ch_id"]);
			$data = $this->db->fetchAll($sql, $bnd);
			foreach ($data as $item){
				$tree_key = $item["ac_val"];
				$tree_val = array(
						"data" => array(
								"ac_id" => $item["ac_id"],
								"ch_id" => $item["ch_id"]
						),
						"children" => array(
		
						)
				);
				$chl["children"][$tree_key] = $tree_val;
			}			
		}

		return $root_forst;
	}

	
	/***
	 * 返回森林
	 * 树的格式为array(data=>'',children=>'')
	 */
	public function plan(){
		$root_forst = $this->account();
		$sql = $this->sqlManager->getSql("/sql/data_plan/getRowsByAccId");
		foreach ($root_forst as &$chl){
			foreach($chl["children"] as &$acc){
				$bnd = array("ac_id" => $acc["data"]["ac_id"]);
				$data = $this->db->fetchAll($sql, $bnd);
				foreach ($data as $item){
					$tree_key = $item["pl_val"];
					$tree_val = array(
							"data" => array(
									"ac_id" => $item["ac_id"],
									"pl_id" => $item["pl_id"]
							),
							"children" => array(
	
							)
					);
					$acc["children"][$tree_key] = $tree_val;
				}
			}
	
		}
	
		return $root_forst;
	}
	


	/***
	 * 返回森林
	 * 树的格式为array(data=>'',children=>'')
	 */
	public function unit(){
		$root_forst = $this->plan();
		$sql = $this->sqlManager->getSql("/sql/data_unit/getRowsByPlanId");
		foreach ($root_forst as &$chl){
			foreach($chl["children"] as &$acc){
				foreach ($acc["children"] as &$plan){
					$bnd = array("pl_id" => $plan["data"]["pl_id"]);
					$data = $this->db->fetchAll($sql, $bnd);
					foreach ($data as $item){
						$tree_key = $item["un_val"];
						$tree_val = array(
								"data" => array(
										"pl_id" => $item["pl_id"],
										"un_id" => $item["un_id"]
								),
								"children" => array(
											
								)
						);
						$plan["children"][$tree_key] = $tree_val;
					}
				}
	
			}
	
		}
	
		return $root_forst;
	}
}