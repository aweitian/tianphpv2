<?php
/**
 * @author:awei.tian
 * @date:2013-12-23
 * @functions:
 */
require_once LIB_PATH."/interfaces/IWrap.php";
class baseWrap implements IWrap{
	public function wrap($data,httpResponse $response){
		if(is_array($data)){
			return json_encode($data);
		}
		return $data;
	}
}