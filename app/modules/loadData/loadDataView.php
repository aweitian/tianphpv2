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
	
	public function showInfo($info){
		$this->wrap($this->fetch("info",array(
				"info" => $info
		)),"Info")->show();
	}
	
	public function showLoadDataPre($total,$sp=""){
		$this->wrap($this->fetch("processing",array(
				"total"=>$total,
				"sp" => $sp
		)),"Loading data to db");
		print $this->html;
		ob_flush();
		flush();
	}
	public function showLoadDataProcessing($pos,$app,$upd){
		echo '<script>u("'.$pos.'",'.$app.','.$upd.')</script>' ;
		ob_flush();
		flush();
	}
	public function doneCallback(){
		echo '<script>s()</script>' ;
		ob_flush();
		flush();
	}
}