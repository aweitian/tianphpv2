<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 * 		Specail for pmcai view

 */

// var_dump(THEME);EXIT;

require_once FILE_SYSTEM_ENTRY . '/template/'.THEME.'/defTplData.php';
class AppView extends View {
	/**
	 *
	 * @var pmcaiMsg $pmcaiMsg
	 */
	protected $pmcaiMsg;
	public function __construct() {
	}
	public function setPmcaiMsg(pmcaiMsg $msg) {
		$this->pmcaiMsg = $msg;
	}
	public function fetch($tpl, $data = array(), $ext = '.tpl.php') {
		if (! is_null ( appCtrl::$msg )) {
			$this->pmcaiMsg = appCtrl::$msg;
		} elseif (is_null ( $this->pmcaiMsg )) {
			tian::throwException ( "0000" );
		}
		$ctl = $this->pmcaiMsg->getControl ();
		ob_start ();
		if (strpos ( $tpl, '/' ) !== 0) {
			$tpl = $this->pmcaiMsg->getModuleLoc () . "/" . $ctl . "/tpl/" . $tpl . $ext;
		}
		include $tpl;
		$ret = ob_get_contents ();
		ob_end_clean ();
		return $ret;
	}
	public function getThemePath($ctlName) {
		return FILE_SYSTEM_ENTRY . "/template/" . THEME . "/modules/" . $ctlName;
	}
	public function getDisThemePath() {
		return FILE_SYSTEM_ENTRY . "/template/" . THEME . "/disease/" ;
	}
	public function getDocThemePath() {
		return FILE_SYSTEM_ENTRY . "/template/" . THEME . "/doctors/";
	}
	public function getTreeThemePath() {
		return FILE_SYSTEM_ENTRY . "/template/" . THEME . "/tree/";
	}
}