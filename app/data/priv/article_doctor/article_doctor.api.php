<?php
/**
 * Date: 2016年5月30日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
 class articleDoctorApi {
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/article_doc.xml");
 	}
 	/**
 	 * 根据 医生ID,标题中包含的字来查询文章
 	 * 返回值的RETURN中包含data和count
 	 * @param int $doid		 医生ID	0不限制
 	 * @param string $q		查询字符串
 	 * @param int $offset	分页参数
 	 * @param int $len		分页参数
 	 * @return rirResult
 	 */
 	public function query($doid,$q,$offset,$len){
 		$cache_sqlmanager = $this->sqlManager;
 		$where_bind = array();
 		$sql_count = $cache_sqlmanager->getSql("/sql/query_on_raw_count");
 		$where_clause = array();
 		if(intval($doid) != 0){
 			$where_clause[] = $cache_sqlmanager->getSql("/sql/where_clause_do");
 			$where_bind["dod"] = $doid;
 		}
 	
 		if($q != ""){
 			$where_clause[] = $cache_sqlmanager->getSql("/sql/where_clause_title");
 			$where_bind["title"] = $q;
 		}
 	
 		$where_clause = join(" AND ", $where_clause);
 		if($where_clause != ""){
 			$where_clause = " WHERE " . $where_clause;
 		}
 		$sql = $sql_count . $where_clause;
 		$cnt = $this->db->fetch($sql, $where_bind);
 	
 		$cnt = $cnt["count"];
 	
 		$sql = strtr($cache_sqlmanager->getSql("/sql/query_on_raw"),array(
 				"@WHERECLAUSE" => $where_clause
 		));
 		$where_bind["offset"] = $offset;
 		$where_bind["length"] = $len;
 	
 		// 		var_dump($sql);exit;
 	
 		$ret = $this->db->fetchAll($sql,$where_bind);
 		if(empty($ret)){
 			if($this->db->hasError()){
 				return new rirResult(1,$this->db->getErrorInfo());
 			}
 		}
 		return new rirResult(0,"ok",array(
 				"data" => $ret,
 				"count" => $cnt
 		));
 	} 	
 	/**
 	 * 获取所有没有相关到医生的文章
 	 * 返回值的RETURN中包含data和count
 	 * @param int $offset	分页参数
 	 * @param int $len		分页参数
 	 * @return rirResult
 	 */
 	public function allNotRel($offset,$len){
 		$cache_sqlmanager = $this->sqlManager;
		$sql_count = $cache_sqlmanager->getSql("/sql/reldoc_homeless/count");

		$sql = $sql_count;
		$cnt = $this->db->fetch($sql, array());
		
		$cnt = $cnt["count"];
		
		$sql = strtr($cache_sqlmanager->getSql("/sql/reldoc_homeless/query"),array());
		$where_bind = array();
		$where_bind["offset"] = $offset;
		$where_bind["length"] = $len;
		$ret = $this->db->fetchAll($sql,$where_bind);
		if(empty($ret)){
			if($this->db->hasError()){
				return new rirResult(1,$this->db->getErrorInfo());
			}
		}
		return new rirResult(0,"ok",array(
			"data" => $ret,
			"count" => $cnt
		));
 	}
 	
 	/**
 	 * 打断文章和医生的关联
 	 * 
 	 * @param int $aid	文章ID
 	 * @param int $did	医生ID
 	 * @return rirResult
 	 */
 	public function disconnect($aid,$dod){
 		$ret = $this->db->exec($this->sqlManager->getSql("/sql/rm"), array(
 			"aid" => $aid,
 			"dod" => $dod,
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
 	 * @param array $idArr		文章ID数组
 	 * @param array $dd			医生ID数组
 	 */
 	public function connect($idArr,$ddArr){
 		foreach ($idArr as $id){
 			$this->update($id,$ddArr);
 		}
 	}
 	/**
 	 * 不管当前状态，以最少的操作变成新状态
 	 * aid + id 唯一
 	 * @param int $aid
 	 * @param array $idArr
 	 * @return int 插入，更新，删除的总行数
 	 */
 	private function update($aid,$idArr){
 		if(!validator::isUint($aid) || !is_array($idArr)){
 			return 0;
 		}
 		$kid = "dod";
 		$hash = array();
 		foreach ($idArr as $id){
 			$hash[$id] = 0;
 		}
 		//从数据库中抓取AID的IDS
 		$sql = $this->sqlManager->getSql("/sql/all");
 		$bnd = array("aid" => $aid);
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
 	
 		$sql = $this->sqlManager->getSql("/sql/update");
 		for($i=0;$i<$len;$i++){
 			$bnd = array();
 			$bnd["aid"] = $aid;
 			$bnd["new_".$kid] =  $new[$i];
 			$bnd["old_".$kid] =  $old[$i];
 			$this->db->exec($sql, $bnd);
 		}
 		//echo "更新",$len;
 		//添加
 		$sql = $this->sqlManager->getSql("/sql/add");
 		for($j=$i;$j<$len_new;$j++){
 			$bnd = array();
 			$bnd["aid"] = $aid;
 			$bnd[$kid] =  $new[$j];
 			$this->db->exec($sql, $bnd);
 		}
 		//echo "添加",$len_new-$i;
 		//删除
 		$sql = $this->sqlManager->getSql("/sql/rm");
 		for($j=$i;$j<$len_old;$j++){
 			$bnd = array();
 			$bnd["aid"] = $aid;
 			$bnd[$kid] =  $old[$j];
 			$this->db->exec($sql, $bnd);
 		}
 		//echo "删除",$len_old-$i;
 		return $len + ($len_new-$i) + ($len_old-$i);
 	}
 	/**
 	 * 
 	 * @param int $aid
 	 * @return array int dod
 	 */
 	public function row($aid){
 		return $this->db->fetchAll($this->sqlManager->getSql("/sql/all"), array(
 				"aid" => $aid,
 		));
 		
 	}
 	
 }