<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */
class rirResult {
	public $result = 0;
	public $info;
	public $return;
	public function __construct($result = 0, $info = "", $return = array()) {
		$this->result = $result;
		$this->info = $info;
		$this->return = $return;
	}
	public function isTrue() {
		return $this->result == 0;
	}
	public function toJSON() {
		return json_encode ( array (
				"result" => $this->result,
				"info" => $this->info,
				"return" => $this->return 
		) );
	}
}