<?php
class editorView extends AppView {
	public function editor($model) {
		$content = "";
		include $this->getThemePath ( "editor" ) . "/index.tpl.php";
	}
}