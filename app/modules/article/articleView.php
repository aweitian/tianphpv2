<?php
class articleView extends AppView {

	
	
	
	public function article($model){
		ob_start();
		include dirname(__FILE__)."/tpl/index.tpl.php";
		$content = ob_get_contents();
		ob_end_clean();
		$this->wrap($content,$title,"template/default/layout.php")->show(); 
		return;
	}
	
	
}