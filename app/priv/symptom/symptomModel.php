<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/priv/symptom/symptom.api.php";
class symptomModel extends privModel{
	/**
	 * 
	 * @var sqlManager
	 */
	private $meta_sqlManager;
	
	private $meta;
	private $count = 0;
	public function __construct(){
		parent::__construct();
	}
	
	
	public function rm($sid){
		$api = new symptomApi();
		return $api->rm($sid);
	}
	
	
	
	public function getData($pid){
		$api = new symptomApi();
		return $api->getData($pid);
	}
	/**
	 * @return rirResult
	 * @param int $sid
	 */
	public function getLvBySid($sid){
		$api = new symptomApi();
		return $api->getLvBySid($sid);
	}
	
	public function edit($sid,$data){
		$api = new symptomApi();
		return $api->edit($sid, $data);
	}
	public function add($data,$pid,$grp,$metaid){
		$api = new symptomApi();
		return $api->add($data, $pid, $grp, $metaid);
	}
	
	public function getNextMetaIdByGrpLv($grp,$lv){
		$api = new symptomApi();
		return $api->getNextMetaIdByGrpLv($grp, $lv);
	}
	
	public function row($sid){
		$api = new symptomApi();
		return $api->row($sid);
	}
	
	
	
	public function getMeta(){
		$api = new symptomApi();
		return $api->getMeta();
	}
	
	
	
	
	
	
	/**
	 * 
	 * @param array $data
	 * @return int rows
	 */
	public function import($data){
		$api = new symptomApi();
		return $api->import($data);
	}
}