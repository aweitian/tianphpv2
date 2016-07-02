<?php
class AppUrl {
	public static function getSwtUrl(){
		return "";
	}
	public static function build($path){
		return HTTP_ENTRY.$path;
	}
}