<?php
/**
 * Date: 2016年5月21日
 * Auth: Awei.tian
 * Desc:
 * 
 * 		普通空间上传类
 * 
 * 依赖:
 * 		
 * 		rirResult
 * 		httpResponse
 * 
 * 

array(3) {
  ["file1"]=>
  array(5) {
    ["name"]=>
    string(9) "newbd.txt"
    ["type"]=>
    string(10) "text/plain"
    ["tmp_name"]=>
    string(14) "/tmp/phpEvmU8X"
    ["error"]=>
    int(0)
    ["size"]=>
    int(5680)
  }
  ["file2"]=>
  array(5) {
    ["name"]=>
    string(8) "a.pcapng"
    ["type"]=>
    string(24) "application/octet-stream"
    ["tmp_name"]=>
    string(14) "/tmp/php8G4oLH"
    ["error"]=>
    int(0)
    ["size"]=>
    int(852356)
  }
  ["file3"]=>
  array(5) {
    ["name"]=>
    string(6) "use.js"
    ["type"]=>
    string(22) "application/javascript"
    ["tmp_name"]=>
    string(14) "/tmp/phpBRs5ur"
    ["error"]=>
    int(0)
    ["size"]=>
    int(1832)
  }
}

 */



require_once dirname(__FILE__)."/IUpload.php";







class uploadCommon implements IUpload {

	private $Directroy; //上传至目录
	private $MaxSize; //最大上传大小
	private $AllowType; //上传类型
	private $rndFileMode;//true为随机文件名，FALSE保持原文件名

	private $path;
	
	/**
	 * 默认上传2M，只能上传JPG,GIF,PNG图片
	 * 上传路径为/uploads/user/目录下
	 * 上传后的文件名为随机文件名
	 */
	public function init(){
		$this->MaxSize = 2097152;//(1024*2)*1024=2097152 就是 2M
		$this->setUploadPath("user");
		$this->AllowType = array();
		$this->AllowType[] = httpResponse::CONTENT_TYPE_JPG;
		$this->AllowType[] = httpResponse::CONTENT_TYPE_GIF;
		$this->AllowType[] = httpResponse::CONTENT_TYPE_PNG;
		$this->rndFileMode = true;
		
	}
	/**
	 * 单位是M
	 * @param int $size
	 * @return uploadCommon
	 */
	public function setMaxSize($size){
		$this->MaxSize = $size * 1024 * 1024;
		return $this;
	}
	
	/**
	 * 
	 * @param int $type httpResponse::CONTENT_TYPE_JPG
	 * @return uploadCommon
	 */
	public function addAllowType($type){
		$this->AllowType[] = $type;
		return $this;
	}
	
	/**
	 * 
	 * @param array $type
	 * @return uploadCommon
	 */
	public function setAllowType($type){
		$this->AllowType = $type;
		return $this;
	}
	
	/**
	 * 
	 * @param bool $mode
	 * @return uploadCommon
	 */
	public function setRndFileMode($mode){
		$this->rndFileMode = !!$mode;
		return $this;
	}
	
	/**
	 * 只能是aaa/bb/cc
	 * @param string $path
	 * @return boolean
	 */
	public function setUploadPath($path){
		if(preg_match("/^\w+(\/\w+)*$/", $path)){
			$this->Directroy = FILE_SYSTEM_ENTRY."/uploads/".$path;
			$this->path = $path;
			self::createFolder($this->Directroy);
			return true;
		}
		return false;
	}
	/**
	 * 创建目录 如果目录存在，则不创建，不存在则创建 static
	 * @param $path 路径
	 * @return
	 */
	private static function createFolder($path) {
		if (!is_dir($path)) {
			self::createFolder(dirname($path));
			@mkdir($path);
			@chmod($path, 0777);
		}
	}
	/**
	 * 有一个成功返回成功，全部失败返回失败，RESULT为失败个数
	 * info		为上传成功多少个
	 * return 	包含两个数组succ,fail,SUCC以NAME为KEY，FAIL普通数组，一级错误信息
	 * @return rirResult
	 */
	public function upload(){
		$result = 1;
		$info = 0;
		$return = array(
			"succ" => array(),
			"fail" => array()
		);
		if(!is_array($_FILES)){
			return new rirResult($result,$info);
		}
		foreach ($_FILES as $fk => $file){
			switch($this->chk($file)){
				case 2:
					$return["fail"][] = $file["name"]."文件大小过大";
					break;
				case 3:
					$return["fail"][] = $file["name"]."文件类型不允许上传";
					break;
				case 4:
					$return["fail"][] = "空间目录不允许上传";
					break;
				case 5:
					$error = array(
						"1" => "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。",
						"2" => "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。",
						"3" => "文件只有部分被上传。",
						"4" => "没有文件被上传。"
					);
					$en = $file["error"];
					if(array_key_exists(strval($en + 1), $error)){
						$return["fail"][] = $error[$en + 1];
					}else{
						$return["fail"][] = $file["name"]."未知错误";
					}
					break;
				case 0:
					$filename = $this->getFileName($file);
					$tmpName  = $file["tmp_name"];
					if (function_exists("move_uploaded_file") && @move_uploaded_file($tmpName, $this->Directroy . "/" . $filename)) {
						@chmod($filename, 0777);
						$return["succ"][$fk] = HTTP_ENTRY."/uploads/".$this->path."/".$filename;
						break;
					} elseif (@copy($tmpName, $this->Directroy . "/" . $filename)) {
						@chmod($filename, 0777);
						$return["succ"][$fk] = HTTP_ENTRY."/uploads/".$this->path."/".$filename;
						break;
					} else {
						$return["fail"][] = $file["name"]."不能移动临时文件";
					}
			}
		}
		$cnt = count($return["succ"]);
		return new rirResult($cnt > 0 ? 0 : count($return["fail"]),$cnt,$return);
	}
	private function chk($file){
		if($file["error"] != 0) return 5;
		if($file["size"] > $this->MaxSize)return 2;
		if(!in_array($file["type"], $this->AllowType))return 3;
		if(!is_writable($this->Directroy))return 4;
		return 0;
	}
	private function getFileName($file){
		if($this->rndFileMode){
			$basename = date("YmdHis").rand(0,9);
			return $basename.".".pathinfo($file["name"],PATHINFO_EXTENSION);
		}else{
			return $file["name"];
		}
	}
	
}
