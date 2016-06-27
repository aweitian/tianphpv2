<?php
/**
 * Date: 2016年5月28日
 * Auth: Awei.tian
 * Desc:
 * 		
 */

 class articalTagsApi {
 	private $sqlManager;
 	private $db;
 	public function __construct(){
 		$this->db = new mysqlPdoBase();
 		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/priv/artical_tags.xml");
 	}
 	
 	/**
 	 * 不管当前状态，以最少的操作变成新状态
 	 * aid + tid 唯一
 	 * @param int $aid
 	 * @param array $tidArr
 	 * @return int 插入，更新，删除的总行数
 	 */
 	public function update($aid,$tidArr){
 		if(!validator::isUint($aid) || !is_array($tidArr)){
 			return 0;
 		}
 		$hash = array();
//  		var_dump($tidArr);exit;
 		foreach ($tidArr as $tid){
 			$hash[$tid] = 0;
 		}
 		//从数据库中抓取AID的IDS
 		$sql = $this->sqlManager->getSql("/artical_tags/q");
 		$bnd = array("aid" => $aid);
 		$ret = $this->db->fetchAll($sql, $bnd);
// var_dump($ret); 		
 		//从HASH中去除已存在的记录
 		$tAr = array();
 		foreach ($ret as $item){
 			if(array_key_exists($item["tid"], $hash)){
 				unset($hash[$item["tid"]]);
 			}else{
 				$tAr[$item["tid"]] = 0;
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
// var_dump($old,$new);exit;
 		$sql = $this->sqlManager->getSql("/artical_tags/update");
 		for($i=0;$i<$len;$i++){
 			$bnd = array(
 				"aid" => $aid,
 				"new_tid" => $new[$i],
 				"old_tid" => $old[$i]
 			);
 			$this->db->exec($sql, $bnd);
 		}
//  		echo "更新",$len;
 		//添加
 		$sql = $this->sqlManager->getSql("/artical_tags/add");
 		for($j=$i;$j<$len_new;$j++){
 			$bnd = array(
 				"aid" => $aid,
 				"tid" => $new[$j]
 			);
 			$this->db->exec($sql, $bnd);
 		}
//  		echo "添加",$len_new-$i;
 		//删除
 		$sql = $this->sqlManager->getSql("/artical_tags/rm");
 		for($j=$i;$j<$len_old;$j++){
 			$bnd = array(
 				"aid" => $aid,
 				"tid" => $old[$j]
 			);
 			$this->db->exec($sql, $bnd);
 		}
//  		echo "删除",$len_old-$i;
 		return $len + ($len_new-$i) + ($len_old-$i);
 	}
 	/**
 	 *
 	 * @param int $aid
 	 * @return array int tid
 	 */
 	public function row($aid){
//  		var_dump($this->sqlManager->getSql("/artical_tags/q"));exit;
 		return $this->db->fetchAll($this->sqlManager->getSql("/artical_tags/q"), array(
 			"aid" => $aid
 		));
 	}
 }