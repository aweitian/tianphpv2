<?php
// require_once FILE_SYSTEM_ENTRY."/modules/scws/pscws4.class.php";
require_once '/var/xunsearch/sdk/php/lib/XS.php';

class searchModel extends AppModel {
	
	public function __construct() {
		
	}
	
	public function testIndex() {
		$xs = new XS(FILE_SYSTEM_ENTRY."/app/modules/search/cnf/search.ini");
		$this->initMySqlDb();
		$data = $this->db->fetchAll("select * from zzx_articles", array());
		
		$doc = new XSDocument;
		foreach ($data as $item) {
			$doc->setFields($item);
			
			// 添加到索引数据库中
			//$xs->index->add($doc);
		}
	}
	
	public function testSearch() {
		echo "<style>em{color:red}</style>";
		$xs = new XS(FILE_SYSTEM_ENTRY."/app/modules/search/cnf/search.ini");
		$data = $xs->search->search("慢性前列腺");
		//var_dump($data);
		foreach ($data as $doc) {
			$subject = $xs->search->highlight($doc->title_fc); // 高亮处理 subject 字段
			$message = $xs->search->highlight($doc->content_fc); // 高亮处理 message 字段
			echo $doc->rank() . '. ' . $subject . " [" . $doc->percent() . "%] - ";
			echo date("Y-m-d", $doc->chrono) . "\n" . $message . "\n";
			echo  "<br>";
		}
	}
	

	
	
	
}