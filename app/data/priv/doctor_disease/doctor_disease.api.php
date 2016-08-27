<?php
/**
 * Date: 2016年5月30日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
class doctorDiseaseApi {
	private $sqlManager;
	private $db;
	public function __construct() {
		$this->db = new mysqlPdoBase ();
		$this->sqlManager = new sqlManager ( FILE_SYSTEM_ENTRY . "/app/sql/priv/doctor_disease.xml" );
	}
	public function notRelDocs() {
		$sql = $this->sqlManager->getSql ( "/doctor_disease/notRel" );
		$bin = array ();
		return new rirResult ( 0, "ok", $this->db->fetchAll ( $sql, $bin ) );
	}
	public function row($did, $dod) {
		$sql = $this->sqlManager->getSql ( "/doctor_disease/select/row" );
		$bnd = array (
				"dod" => $sid,
				"did" => $did 
		);
		$ret = $this->db->fetch ( $sql, $bnd );
		// var_dump($sql,$bnd);exit;
		if (! empty ( $ret )) {
			if ($this->db->hasError ()) {
				return new rirResult ( 9, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	public function getAllByDid($did) {
		$sql = $this->sqlManager->getSql ( "/doctor_disease/select/did" );
		$bin = array ("did" => $did);
		$data = $this->db->fetchAll ( $sql, $bin );
		if (empty ( $row )) {
			return new rirResult ( 1, $this->db->getErrorInfo () );
		}
		return new rirResult ( 0, "ok", $data );
	}
	public function getAllByDod($dod) {
		$sql = $this->sqlManager->getSql ( "/doctor_disease/select/dod" );
		$bin = array ("dod" => $dod);
		$data = $this->db->fetchAll ( $sql, $bin );
		if (empty ( $row )) {
			return new rirResult ( 1, $this->db->getErrorInfo () );
		}
		return new rirResult ( 0, "ok", $data );
	}
	public function getAll() {
		$sql = $this->sqlManager->getSql ( "/doctor_disease/select/all" );
		$bin = array ();
		$data = $this->db->fetchAll ( $sql, $bin );
		if (empty ( $row )) {
			return new rirResult ( 1, $this->db->getErrorInfo () );
		}
		return new rirResult ( 0, "ok", $data );
	}
	/**
	 *
	 * @param int $weight        	
	 * @param int $dod        	
	 * @param int $did        	
	 * @return rirResult
	 */
	public function add($dod, $did, $weight) {
		// validate data
		if (! validator::isUint ( $dod )) {
			return new rirResult ( 2, "invalid dod" );
		}
		if (! validator::isUint ( $did )) {
			return new rirResult ( 3, "invalid did" );
		}
		if (! validator::isUint ( $weight )) {
			return new rirResult ( 4, "invalid weight" );
		}
		
		$sql = $this->sqlManager->getSql ( "/doctor_disease/add" );
		$bind = array (
				"dod" => $dod,
				"did" => $did,
				"weight" => $weight 
		);
		$sid = $this->db->insert ( $sql, $bind );
		if ($sid == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 9, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $sid );
	}
	
	/**
	 *
	 * @param int $sid        	
	 * @param string $letter        	
	 * @return rirResult
	 */
	public function update($dod, $did, $weight) {
		
		// validate data
		if (! validator::isUint ( $dod )) {
			return new rirResult ( 2, "invalid dod" );
		}
		if (! validator::isUint ( $did )) {
			return new rirResult ( 3, "invalid did" );
		}
		if (! validator::isUint ( $weight )) {
			return new rirResult ( 4, "invalid weight" );
		}
		
		$sql = $this->sqlManager->getSql ( "/doctor_disease/update" );
		$bind = array (
				"dod" => $dod,
				"did" => $did,
				"weight" => $weight 
		);
		$sid = $this->db->exec ( $sql, $bind );
		if ($sid == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 9, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $sid );
	}
	public function remove($dod, $did) {
		$ret = $this->db->exec ( $this->sqlManager->getSql ( "/doctor_disease/rm" ), array (
				"dod" => $dod,
				"did" => $did 
		) );
		if ($ret == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
	public function clear() {
		$ret = $this->db->exec ( $this->sqlManager->getSql ( "/doctor_disease/clear" ), array (
	
		) );
		if ($ret == 0) {
			if ($this->db->hasError ()) {
				return new rirResult ( 1, $this->db->getErrorInfo () );
			}
		}
		return new rirResult ( 0, "ok", $ret );
	}
}