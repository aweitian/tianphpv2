<?php
interface IOp {
	public function getOpType();
	public function opStart();
	
	//操作失败
	public function opUpdate();
	//获取这个类型今天操作失败次数
	public function getOPFailCnt();
}

?>