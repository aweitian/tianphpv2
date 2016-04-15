<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 */
class AppController extends Controller{
	/**
	 * 
	 * @var httpResponse $response
	 */
	protected $response;
	public function __construct(){
		$this->response = new httpResponse();
	}
}