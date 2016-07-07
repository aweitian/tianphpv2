<?php
class diseaseView extends AppView {

	
	
	
	public function disease($model){
		var_dump($model);
		ob_start();
		include dirname(__FILE__)."/tpl/index.tpl.php";
		$content = ob_get_contents();
		ob_end_clean();
		$this->wrap($content,$title,"template/default/layout.php")->show(); 
		return;
	}
	
	
}