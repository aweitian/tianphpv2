<?php
/**
 * Date: 2016年5月26日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
require_once dirname ( __FILE__ ) . "/tree.validator.php";
class treeApi {
	private $sqlManager;
	private $db;
	public function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/priv/tree.xml" );
	}
	
	/**
	 *
	 * @param int $pid        	
	 * @param string $name        	
	 * @param string $url        	
	 * @param int $order        	
	 * @param string $layout        	
	 * @return rirResult
	 */
	public function add($pid, $name, $url, $order = 0, $layout = "") {
		// validate
		if (! treeValidator::isValidName( $name )) {
			return new rirResult ( 1, "栏目名不能为空" );
		}
		if (! treeValidator::isValidUrl ( $url )) {
			return new rirResult ( 2, "生成网址只能是 /,字母，数字，横线，下划线" );
		}
		if (! validator::isInt ( $order )) {
			return new rirResult ( 3, "顺序只能为数字" );
		}
		
		// 先检查PID结点是否存在
		if ($pid != 0){
			$sql = $this->sqlManager->getSql ( "/tree/row_full" );
			$bnd = array (
					"sid" => $pid 
			);
			$row = $this->db->fetch ( $sql, $bnd );
			if (empty ( $row )) {
				return new rirResult ( 4, "当前结点不存在" );
			}			
		} else {
			//虚拟的根结点
			$row = array("pid" => null,"lft" => 0);
			$sql = $this->sqlManager->getSql("/tree/virtualRoot/rgt");
			$data = $this->db->fetch($sql, array());
			if(is_null($data["rgt"])){
				$row["rgt"] = 1;
			} else {
				$row["rgt"] = $data["rgt"] + 1;
			}
		}

		// 在叶子结点上添加新结点
		// 获取当前结点的LEFT值
		$rgt = $row ["rgt"];
		// 平衡整个树
		$sql = $this->sqlManager->getSql ( "/tree/add/balance/rgt" );
		$bnd = array (
				"prgt" => $rgt 
		);
		$this->db->exec ( $sql, $bnd );
		$sql = $this->sqlManager->getSql ( "/tree/add/balance/lft" );
		$bnd = array (
				"prgt" => $rgt 
		);
		$this->db->exec ( $sql, $bnd );
		// 插入新结点
		$sql = $this->sqlManager->getSql ( "/tree/add/base" );
		$bnd = array (
				"name" => $name,
				"url" => $url,
				"order" => $order,
				"layout" => $layout,
				"prgt" => $rgt ,
				"pid" => $pid 
		);
		$sid = $this->db->exec ( $sql, $bnd );
		if ($sid == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 9, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $sid );
	
	}
	
	/**
	 * 返回NAME的数组
	 * @param int $pid
	 * @return array;
	 */
	public function path($pid){
		$sql = $this->sqlManager->getSql ( "/tree/path" );
		$bnd = array (
				"pid" => $pid
		);
		return $this->db->fetchAll($sql, $bnd);
	}
	
	
	
	/**
	 * 删除结点和结点下所有孩子和子孙结点
	 * @param int $pid
	 * @return rirResult
	 */
	public function rm($pid) {
		//先检查PID结点是否存在,并计算待删除结点的LEFT,RIGHT,SPAN
		$sql = $this->sqlManager->getSql("/tree/remove/getSpan");
		$bnd = array (
				"pid" => $pid
		);
		$row = $this->db->fetch ( $sql, $bnd );
		if (empty ( $row )) {
			return new rirResult ( 1, "当前结点不存在" );
		}
		$span = $row["span"];
		$left = $row["lft"];
		$right = $row["rgt"];
		
		
// 		var_dump($span,$left,$right);exit;
		
		$sql = $this->sqlManager->getSql("/tree/remove/balance/self");
		$bnd = array(
			"plft" => $left,	
			"prgt" => $right,	
		);
		$ret = $this->db->exec($sql, $bnd);
		
		//平衡树
		$sql = $this->sqlManager->getSql("/tree/remove/balance/rgt");
		$bnd = array(
				"span" => $span,
				"prgt" => $right,
		);
		$this->db->exec($sql, $bnd);
		$sql = $this->sqlManager->getSql("/tree/remove/balance/lft");
		$this->db->exec($sql, $bnd);
		if ($ret == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	
	
	
	/**
	 * 返回所有孩子结点
	 * 返回字段:sid,name,url,order,layout
	 * @return rirResult;
	 */
	public function getChildren($pid) {
		$sql = $this->sqlManager->getSql ( "/tree/children" );
		$ret = $this->db->fetchAll ( $sql, array ("pid" => $pid) );
		if (empty ( $ret )) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	
	
	
	
	/**
	 * 返回字段:sid,name,url,order,layout
	 * @param int $sid
	 * @return rirResult
	 */
	public function row($sid) {
		$sql = $this->sqlManager->getSql ( "/tree/row" );
		$ret = $this->db->fetch ( $sql, array (
				"sid" => $sid 
		) );
		if (empty ( $ret )) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	
	/**
	 * 
	 * @param int $sid
	 * @param string $name
	 * @param string $url
	 * @param int $order
	 * @param string $layout
	 * @return rirResult
	 */
	public function update($sid,  $name, $url, $order = 0, $layout = "") {
		// validate
		if (! treeValidator::isValidTags ( $text )) {
			return new rirResult ( 1, "栏目名不能为空" );
		}
		if (! treeValidator::isValidUrl ( $url )) {
			return new rirResult ( 2, "生成网址只能是 /,字母，数字，横线，下划线" );
		}
		if (! validator::isInt ( $order )) {
			return new rirResult ( 3, "顺序只能为数字" );
		}
		$sql = $this->sqlManager->getSql ( "/tree/update" );
		$bnd = array (
					"name" => $name,
					"url" => $url,
					"order" => $order,
					"layout" => $layout,
			);
		$sid = $this->db->exec ( $sql, $bnd );
		if ($sid == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 9, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $sid );
	}
}