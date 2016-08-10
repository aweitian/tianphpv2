<?php
class subscribeView extends AppView {
	public function subscribe($model) {
		include $this->getThemePath ( "subscribe" ) . "/index.tpl.php";
	}
}