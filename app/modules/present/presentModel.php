<?php
class presentModel extends AppModel {
	public function __construct() {
	}
	
	/**
	 * sid,uid,dod,did,content,date
	 * 
	 * @param int $length        	
	 * @param int $offset        	
	 * @return array(fetchAll);
	 */
	public function getDataByDod($dod, $length, $offset = 0) {
		return letterUIApi::getInstance ()->getDataByDod ( $dod, $length, $offset );
	}
	/**
	 * sid,uid,dod,did,content,date
	 * 
	 * @param int $length        	
	 * @param int $offset        	
	 * @return array(fetchAll);
	 */
	public function getDataByUid( $length, $offset = 0) {
		$info = AppUser::getInstance()->auth->getInfo();
		return letterUIApi::getInstance ()->getDataByUid ($info["sid"] , $length, $offset );
	}
}