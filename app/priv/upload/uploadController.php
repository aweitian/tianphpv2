<?php
/**
 * Date: 2016-05-09
 * Author: Awei.tian
 * Description: 
 */
require_once FILE_SYSTEM_ENTRY.'/app/priv/init.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/upload/uploadModel.php';
require_once FILE_SYSTEM_ENTRY.'/app/priv/upload/uploadView.php';
class uploadController extends privController{
	/**
	 * 
	 * @var uploadModel
	 */
	private $model;
	/**
	 * 
	 * @var uploadView
	 */
	private $view;
	public function __construct(){
		$this->model = new uploadModel();
		$this->view = new uploadView();
		$this->checkPriv();
	}
	public function welcomeAction(){
		$info = uploadFactory::getInstance()
		->upload();
		if($info->isTrue()){
			foreach ($info->return["succ"] as $file_url){
				print json_encode(array('error' => 0, 'url' => $file_url));
				exit;
			}
			
			
		}else{
			if(isset($info->return["fail"][0])){
				print json_encode(array('error' => 1, 'message' => $info->return["fail"][0]));
				exit;
			}else{
				print json_encode(array('error' => 1, 'message' => "upload failed"));
				exit;
			}
			
		}
	}
	
	public function listAction(){

		$php_path = dirname(__FILE__) . '/';
		$php_url = dirname($_SERVER['PHP_SELF']) . '/';
		
		//根目录路径，可以指定绝对路径，比如 /var/www/attached/
		$root_path = 'uploads/user/';
		//根目录URL，可以指定绝对路径，比如 http://www.yoursite.com/attached/
		$root_url = '/uploads/user/';
		//图片扩展名
		$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
		
		//目录名
// 		$dir_name = empty($_REQUEST['dir']) ? '' : trim($_REQUEST['dir']);
// 		if (!in_array($dir_name, array('', 'image', 'flash', 'media', 'file'))) {
// 			echo "Invalid Directory name.";
// 			exit;
// 		}
// 		if ($dir_name !== '') {
// 			$root_path .= $dir_name . "/";
// 			$root_url .= $dir_name . "/";
// 			if (!file_exists($root_path)) {
// 				//mkdir($root_path);
// 			}
// 		}
		
// 		//根据path参数，设置各路径和URL
// 		if (empty($_REQUEST['path'])) {
// 			$current_path = $root_path . '/';
// // 			exit($current_path);
// 			$current_url = $root_url;
// 			$current_dir_path = '';
// 			$moveup_dir_path = '';
// 		} else {
// 			$current_path = realpath($root_path) . '/' . $_REQUEST['path'];
// 			$current_url = $root_url . $_REQUEST['path'];
// 			$current_dir_path = $_REQUEST['path'];
// 			$moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
// 		}
// // 		echo realpath($root_path);exit;
// 		//排序形式，name or size or type
// 		$order = empty($_REQUEST['order']) ? 'name' : strtolower($_REQUEST['order']);
		
// 		//不允许使用..移动到上一级目录
// 		if (preg_match('/\.\./', $current_path)) {
// 			echo 'Access is not allowed.';
// 			exit;
// 		}
// 		//最后一个字符不是/
// 		if (!preg_match('/\/$/', $current_path)) {
// 			echo 'Parameter is not valid.';
// 			exit;
// 		}
// 		//目录不存在或不是目录
// 		if (!file_exists($current_path) || !is_dir($current_path)) {
// 			echo 'Directory does not exist.';
// 			exit;
// 		}
		$current_path = FILE_SYSTEM_ENTRY."/uploads/user";
		//遍历目录取得文件信息
		$file_list = array();
		if ($handle = opendir($current_path)) {
			$i = 0;
			while (false !== ($filename = readdir($handle))) {
				if ($filename{0} == '.') continue;
				$file = $current_path . $filename;
				if (is_dir($file)) {
					$file_list[$i]['is_dir'] = true; //是否文件夹
					$file_list[$i]['has_file'] = (count(scandir($file)) > 2); //文件夹是否包含文件
					$file_list[$i]['filesize'] = 0; //文件大小
					$file_list[$i]['is_photo'] = false; //是否图片
					$file_list[$i]['filetype'] = ''; //文件类别，用扩展名判断
				} else {
					$file_list[$i]['is_dir'] = false;
					$file_list[$i]['has_file'] = false;
					$file_list[$i]['filesize'] = @filesize($file);
					$file_list[$i]['dir_path'] = '';
					$file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
					$file_list[$i]['is_photo'] = in_array($file_ext, $ext_arr);
					$file_list[$i]['filetype'] = $file_ext;
				}
				$file_list[$i]['filename'] = $filename; //文件名，包含扩展名
				$file_list[$i]['datetime'] = date('Y-m-d H:i:s', @filemtime($file)); //文件最后修改时间
				$i++;
			}
			closedir($handle);
		}
		usort($file_list, array($this,'cmp_func'));
		
		$result = array();
		//相对于根目录的上一级目录
		$result['moveup_dir_path'] = "";
		//相对于根目录的当前目录
		$result['current_dir_path'] = "";
		//当前目录的URL
		$result['current_url'] = "/uploads/user/";
		//文件数
		$result['total_count'] = count($file_list);
		//文件列表数组
		$result['file_list'] = $file_list;
		
		//输出JSON字符串
		header('Content-type: application/json; charset=UTF-8');
		echo json_encode($result);
	}
	
	
	private function cmp_func($a, $b) {
		$order = empty($_REQUEST['order']) ? 'name' : strtolower($_REQUEST['order']);
		if ($a['is_dir'] && !$b['is_dir']) {
			return -1;
		} else if (!$a['is_dir'] && $b['is_dir']) {
			return 1;
		} else {
			if ($order == 'size') {
				if ($a['filesize'] > $b['filesize']) {
					return 1;
				} else if ($a['filesize'] < $b['filesize']) {
					return -1;
				} else {
					return 0;
				}
			} else if ($order == 'type') {
				return strcmp($a['filetype'], $b['filetype']);
			} else {
				return strcmp($a['filename'], $b['filename']);
			}
		}
	}
}