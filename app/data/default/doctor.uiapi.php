<?php
/**
 * 前台TPL文件调用医生信息接口类
 * @author awei.tian
 * @date   2016-6-25
 */
class doctorUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager(FILE_SYSTEM_ENTRY."/app/sql/default/ui_ask.xml");
	}

	/**
	 * sid,id,name,lv,avatar,date,dod,dlv,start,hot,love,contribution,desc,spec
	 * 3  zdz     郑殿增        ccccccc  zdz.jpg  2016-05-16       3       3       0       0       0             0  doc     spce    
	 * @param int $dod
	 * @return array fetch;
	 */
	public function getInfoByDod($dod){
		return $this->db->fetch($this->sqlManager->getSql("/ui_doctor/infoByDid"), array(
			"dod" => $dod
		));
	}
	
	
	
}