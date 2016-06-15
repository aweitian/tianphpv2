<?php
require_once FILE_SYSTEM_ENTRY."/modules/scws/pscws4.class.php";
class searchModel extends Model {
	
	public function __construct() {
		
	}
	
	private function splitWord($query) {
		$ret = array();
		$cws = new PSCWS4();
		$cws->set_charset('utf8');
		$cws->set_dict(FILE_SYSTEM_ENTRY.'/modules/scws/etc/dict.utf8.xdb');
		$cws->set_rule(FILE_SYSTEM_ENTRY.'/modules/scws/etc/rules.utf8.ini');
		$cws->set_multi(3);
		$cws->set_ignore(true);
		$cws->set_debug(true);
		$cws->set_duality(true);
		$cws->send_text($query);
		while ($tmp = $cws->get_result()) {
			$ret[] =$tmp;
		}
		return $ret;
	}
	

	
	
	
}