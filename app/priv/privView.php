<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 * 		Specail for pmcai view
 */
class privView extends AppView{
	/**
	 * 
	 * @var pmcaiMsg $pmcaiMsg
	 */
	protected $pmcaiMsg;
	
	public function __construct(){
		
	}
	public function wrap($content,$title="",$tpl = 'template/layout-priv.php'){
		return parent::wrap($content,$title,$tpl);
	}
}