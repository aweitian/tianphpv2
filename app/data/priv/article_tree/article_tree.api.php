<?php
/**
 * Date: 2016年5月31日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
class articleTreeApi {
	private $sqlManager;
	private $db;
	public function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/priv/article_tree.xml" );
	}
	
	/**
	 * 不管当前状态，以最少的操作变成新状态
	 * aid + id 唯一
	 * 
	 * @param int $aid        	
	 * @param array $idArr        	
	 * @return int 插入，更新，删除的总行数
	 */
	private function update($aid, $idArr) {
		if (! validator::isUint ( $aid ) || ! is_array ( $idArr )) {
			return 0;
		}
		$kid = "trd";
		$hash = array ();
		foreach ( $idArr as $id ) {
			$hash [$id] = 0;
		}
		// 从数据库中抓取AID的IDS
		$sql = $this->sqlManager->getSql ( "/articleTree/all" );
		$bnd = array (
				"aid" => $aid 
		);
		$ret = $this->db->fetchAll ( $sql, $bnd );
		
		// 从HASH中去除已存在的记录
		$tAr = array ();
		foreach ( $ret as $item ) {
			if (array_key_exists ( $item [$kid], $hash )) {
				unset ( $hash [$item [$kid]] );
			} else {
				$tAr [$item [$kid]] = 0;
			}
		}
		
		// 更新:选两者长度最短的，然后更新
		$old = array_keys ( $tAr );
		$new = array_keys ( $hash );
		$len_old = count ( $old );
		$len_new = count ( $new );
		if ($len_old < $len_new) {
			$len = $len_old;
		} else {
			$len = $len_new;
		}
		
		$sql = $this->sqlManager->getSql ( "/articleTree/update" );
		for($i = 0; $i < $len; $i ++) {
			$bnd = array ();
			$bnd ["aid"] = $aid;
			$bnd ["new_" . $kid] = $new [$i];
			$bnd ["old_" . $kid] = $old [$i];
			$this->db->exec ( $sql, $bnd );
		}
		// echo "更新",$len;
		// 添加
		$sql = $this->sqlManager->getSql ( "/articleTree/add" );
		for($j = $i; $j < $len_new; $j ++) {
			$bnd = array ();
			$bnd ["aid"] = $aid;
			$bnd [$kid] = $new [$j];
			$this->db->exec ( $sql, $bnd );
		}
		// echo "添加",$len_new-$i;
		// 删除
		$sql = $this->sqlManager->getSql ( "/articleTree/rm" );
		for($j = $i; $j < $len_old; $j ++) {
			$bnd = array ();
			$bnd ["aid"] = $aid;
			$bnd [$kid] = $old [$j];
			$this->db->exec ( $sql, $bnd );
		}
		// echo "删除",$len_old-$i;
		return $len + ($len_new - $i) + ($len_old - $i);
	}
	
	
	
	/**
	 * 打断文章和疾病的关联
	 *
	 * @param int $aid        	
	 * @param int $did        	
	 * @return rirResult
	 */
	public function disconnect($aid, $trd) {
		$ret = $this->db->exec ( $this->sqlManager->getSql ( "/articleTree/rm" ), array (
				"aid" => $aid,
				"trd" => $trd 
		) );
		if ($ret == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	
	/**
	 * 没有返回值
	 * 
	 * @param array $idArr        	
	 * @param array $dd        	
	 */
	public function connect($idArr, $trdArr) {
		foreach ( $idArr as $id ) {
			$this->update ( $id, $trdArr );
		}
	}
	/**
	 *
	 * @param int $aid        	
	 * @return array int dod
	 */
	public function all($trd,$length,$offset) {
		return $this->db->fetchAll ( $this->sqlManager->getSql ( "/articleTree/all" ), array (
				"trd" => $trd ,
				"offset" => $offset ,
				"length" => $length 
		) );
	}
}