<?php
/**
 * @author awei.tian
 * date: 2013-11-7
 * 说明:
 */
interface IControlNotFound{
	/**
	 * 
	 * @param string $url requesturi
	 */
	function hook404(pmcaiMsg $msg);
}