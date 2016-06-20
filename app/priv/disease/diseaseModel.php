<?php
/**
 * Date: 2016-05-10
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY."/app/data/disease/disease.api.php";
class diseaseModel extends privModel{
	/**
	 * 
	 * @var diseaseApi
	 */
	private $api;
	
	public function __construct(){
		parent::__construct();
		$this->api = new diseaseApi();
	}
	
	
	public function rm($sid){
		return $this->api->rm($sid);
	}
	
	public function getData($pid){
		return $this->api->getData($pid);
	}
	/**
	 * @return rirResult
	 * @param int $sid
	 */
	public function getLvBySid($sid){
		return $this->api->getLvBySid($sid);
	}
	
	public function edit($sid,$data){
		return $this->api->edit($sid, $data);
	}
	public function add($data,$pid,$metaid){
		return $this->api->add($data, $pid, $metaid);
	}
	
	public function getNextMetaIdByGrpLv($lv){
		return $this->api->getNextMetaIdByGrpLv($lv);
	}
	
	public function row($sid){
		return $this->api->row($sid);
	}
	
	public function getMeta(){
		return $this->api->getMeta();
	}
	
	/**
	 * 
	 * @param array $data
	 * @return int rows
	 */
	public function import($data){
		return $this->api->import($data);
	}
}