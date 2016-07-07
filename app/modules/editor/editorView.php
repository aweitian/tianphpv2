<?php
class editorView extends AppView {
	
	public function editor($model){
		$content = "";
		include dirname(__FILE__)."/tpl/index.tpl.php";
	}
	
	
}