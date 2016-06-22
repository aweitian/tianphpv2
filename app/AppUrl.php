<?php
class AppUrl {
	public static function build($path){
		return HTTP_ENTRY.$path;
	}
}