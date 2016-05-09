<?php
/**
 * Date: May 9, 2016
 * Author: Awei.tian
 * Description: 
 */
class privController extends Controller{
	/**
	 * 
	 * @var httpResponse
	 */
	protected $response;
	
	protected function initHttpResponse(){
		$this->response = new httpResponse();
	}
}