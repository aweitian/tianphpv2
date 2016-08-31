<?php
/**
 * Date: 2016年5月30日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class symptomDiseaseApi {
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/symptom_disease.xml");
 	}
 	
 	/**
 	 * 打断症状和疾病的关联
 	 * 
 	 * @param int $syd	症状ID
 	 * @param int $did	疾病ID
 	 * @return rirResult
 	 */
 	public function disconnect($syd,$did){
 		$ret = $this->db->exec($this->sqlManager->getSql("/symptom_disease/rm"), array(
 			"syd" => $syd,
 			"did" => $did,
 		));
 		if($ret == 0){
 			if($this->db->hasError()){
 				return new rirResult(1,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",$ret);
 	}
 	/**
 	 * 没有返回值
 	 * @param array $idArr		症状ID数组
 	 * @param array $dd			疾病ID数组
 	 */
 	public function connect($idArr,$ddArr){
 		foreach ($idArr as $id){
 			$this->update($id,$ddArr);
 		}
 	}
 	/**
 	 * 不管当前状态，以最少的操作变成新状态
 	 * syd + id 唯一
 	 * @param int $syd
 	 * @param array $idArr
 	 * @return int 插入，更新，删除的总行数
 	 */
 	private function update($syd,$idArr){
 		if(!validator::isUint($syd) || !is_array($idArr)){
 			return 0;
 		}
 		$kid = "did";
 		$hash = array();
 		foreach ($idArr as $id){
 			$hash[$id] = 0;
 		}
 		//从数据库中抓取syd的IDS
 		$sql = $this->sqlManager->getSql("/symptom_disease/all");
 		$bnd = array("syd" => $syd);
 		$ret = $this->db->fetchAll($sql, $bnd);
 	
 		
 		
 		//从HASH中去除已存在的记录
 		$tAr = array();
 		foreach ($ret as $item){
 			if(array_key_exists($item[$kid], $hash)){
 				unset($hash[$item[$kid]]);
 			}else{
 				$tAr[$item[$kid]] = 0;
 			}
 		}
 	
 		

 		
 		//更新:选两者长度最短的，然后更新
 		$old     = array_keys($tAr);
 		$new     = array_keys($hash);
 		$len_old = count($old);
 		$len_new = count($new);
 		if($len_old < $len_new){
 			$len = $len_old;
 		}else{
 			$len = $len_new;
 		}
 	
 		
 		
 		
 		$sql = $this->sqlManager->getSql("/symptom_disease/update");
 		for($i=0;$i<$len;$i++){
 			$bnd = array();
 			$bnd["syd"] = $syd;
 			$bnd["new_".$kid] =  $new[$i];
 			$bnd["old_".$kid] =  $old[$i];
 			$this->db->exec($sql, $bnd);
 		}
 		//echo "更新",$len;
 		//添加
 		$sql = $this->sqlManager->getSql("/symptom_disease/add");
 		for($j=$i;$j<$len_new;$j++){
 			$bnd = array();
 			$bnd["syd"] = $syd;
 			$bnd[$kid] =  $new[$j];
 			$this->db->exec($sql, $bnd);
 		}
 		//echo "添加",$len_new-$i;
 		//删除
 		$sql = $this->sqlManager->getSql("/symptom_disease/rm");
 		
 		
 		
 		for($j=$i;$j<$len_old;$j++){
 			$bnd = array();
 			$bnd["syd"] = $syd;
 			$bnd[$kid] =  $old[$j];
 			
//  			var_dump($sql, $bnd);exit;
 			$this->db->exec($sql, $bnd);
 		}
 		//echo "删除",$len_old-$i;
 		return $len + ($len_new-$i) + ($len_old-$i);
 	}
 	/**
 	 * 
 	 * @param int $syd
 	 * @return array int did
 	 */
 	public function rows($syd){
 		return $this->db->fetchAll($this->sqlManager->getSql("/symptom_disease/all"), array(
 				"syd" => $syd,
 		));
 		
 	}
 	
 }