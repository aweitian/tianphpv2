<?php
/**
 * 前台TPL文件调用疾病信息接口类
 * @author awei.tian
 * @date   2016-6-27
 */
class diseaseUIApi {
	private $sqlManager;
	private $db;
	public function __construct(){
		$this->db = new mysqlPdoBase();
		$this->sqlManager = new sqlManager("ui_disease");
	}
	
	/**
	 * 
	 * 返回类似下面的二维数组
	 * 
	 * pid  	pd		mid  	md       	url    
	 * ------  	------	------  --------	-------- 
	 * 322  	男性不育	327  	男性不育症		nxbyz
	 * 322  	男性不育	326  	肾虚           		sx 
	 * @return array(fetchAll);
	 */
	public function getInfo() {
		$sql = $this->sqlManager->getSql("/ui_disease/tree2table");
		return $this->db->fetchAll($sql, array());
	}
	
	/**
	 * sid  key     data         pid     grp  	metaid  
	 * 327  nxbyz   男性不育症                  322       1 	2
	 * @param string $urlkey
	 * @return array(fetch);
	 */
	public function getRowByDiskey($urlkey) {
		$sql = $this->sqlManager->getSql("/ui_disease/row_disease_url");
		return $this->db->fetch($sql, array(
			"key" => $urlkey
		));
	}
	
	/**
	 * sid  thumb                              title   desc    
	 * 30  /uploads/user/201606211043371.png  tald    sdalfkwe  
	 * 根据病种ID获取疾病知识的文章
	 * @param int $did
	 * @return array fetch
	 */
	public function getArticalTag7ByDid($did){
		$sql = $this->sqlManager->getSql("/ui_disease/ArticalTag7/main");
		return $this->db->fetch($sql, array(
			"did" => $did
		));
	}
	
}