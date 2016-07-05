<?php
class subscribeView extends AppView {

	
	
	
	public function subscribe($model){
		$title = "";
		ob_start();
		include dirname(__FILE__)."/tpl/index.tpl.php";
		$content = ob_get_contents();
		ob_end_clean();
		$this->wrap($content,$title,"template/default/layout.php")->show(); 
		return;
	}
	
	
}