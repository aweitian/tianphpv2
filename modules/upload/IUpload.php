<?php
interface IUpload {
	/**
	 * info		为上传成功多少个
	 * return 	包含两个数组succ,fail,SUCC以NAME为KEY，FAIL普通数组，一级错误信息
	 * @return rirResult
	 */
	function upload();
}