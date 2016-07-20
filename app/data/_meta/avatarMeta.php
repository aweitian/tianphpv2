<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月20日
 * @Desc: 
 * 依赖:
 */
class avatarMeta {
	public static function getAllAvatar() {
		$files = tian::getFileList ( FILE_SYSTEM_ENTRY . "/static/avatar", "gif,jpg,png" );
		foreach ( $files as &$item ) {
			$item = pathinfo ( $item, PATHINFO_BASENAME );
		}
		return $files;
	}
}