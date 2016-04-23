<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
class loadDataView extends AppView{
	
	public function showFormUI($submit_url){
		$this->wrap($this->fetch("form",array(
				"submit_url"=>$submit_url
		)),"Upload a csv file")->show();
	}
	
	public function showUploadResult(rirResult $r,$submit_url){
		$this->wrap($this->fetch("upResult",array(
				"submit_url"=>$submit_url,
				"r" => $r
		)),"Confirm to load data to database")->show();
	}
	
	
	
	public function showLoadDataPre($total){
		$this->wrap($this->fetch("processing",array(
				"total"=>$total,
		)),"Loading data to db");
		print $this->html;
		ob_flush();
		flush();
	}
	public function showLoadDataProcessing($pos,rirResult $r){
		echo '<script>u('.(
				$r->isTrue() ?
				$pos + 1
				:
				'"'.$r->info.'"'
			).','.($r->isTrue() ? 'true' : 'false').')</script>' ;
		ob_flush();
		flush();
	}
}