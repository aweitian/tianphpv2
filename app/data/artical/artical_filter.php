<?php
/**
 * Date: May 12, 2016
 * Author: Awei.tian
 * Description: 
 */
class artical_filter {
	public static function title($v) {
		return htmlentities($v);
	}
}