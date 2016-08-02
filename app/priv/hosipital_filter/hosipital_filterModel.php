<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */

require_once FILE_SYSTEM_ENTRY.'/app/data/priv/filter_meta/filter_meta.api.php';
require_once FILE_SYSTEM_ENTRY.'/app/data/priv/filter_sets/filterSet.api.php';
require_once FILE_SYSTEM_ENTRY.'/app/data/priv/hosipital_filterset/hosipital_filterset.api.php';
require_once FILE_SYSTEM_ENTRY.'/app/data/priv/hosipital_filter/hosipital_filter.api.php';
require_once FILE_SYSTEM_ENTRY.'/app/data/priv/hosipital/hosipital.api.php';

class hosipital_filterModel extends privModel{
	public function __construct(){
		parent::__construct();
	}
	public function getAvailableMeta(){
		$api = new filterMetaApi();
		return $api->all();
	}
/**
	 *
	 * @param int $sid
	 *        	(add 0 /edit > 0)
	 * @return array
	 */
	public function getDataDomainRng($sid = 0) {
		$api = new filterMetaApi();
		return $api->getDataDomainRng($sid);
	}
	/**
	 * 编辑和添加DATA DOMAIN一样
	 * @return array
	 */
	public function getDataDomainLikestr() {
		$api = new filterMetaApi();
		return $api->getDataDomainLikestr();
	} 
	public function getChildren($pid,$mid){
		$api = new filterSetApi();
		return $api->getChildren($pid,$mid);
	}
	public function search($data){
		$api = new hosipitalFilterApi();
		return $api->search($data);
		
	}
	
}