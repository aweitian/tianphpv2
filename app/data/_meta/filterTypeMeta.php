<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月28日
 * @Desc: 
 * 依赖:
 */
class filterTypeMeta{
	public static function getData(){
		return array(
			"set" => "条件集合",
			"range" => "数字区间",
			"likestr" => "字符串包含",
		);
	}
}