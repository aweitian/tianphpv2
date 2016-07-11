<?php
function copy_dir($source, $dest, $name){
	$srcModule = "main";
	$dest = str_replace($srcModule,$name,$dest);
	$result = false;
	if (is_file($source)) {
		if ($dest[strlen($dest)-1] == '/') {
			$__dest = $dest . "/" . basename($source);
		} else {
			$__dest = $dest;
		}
		
		file_put_contents(
			$__dest, 
			str_replace($srcModule,$name,file_get_contents($source))
		);
		chmod($__dest, 0644);
	}elseif (is_dir($source)) {
		if ($dest[strlen($dest)-1] == '/') {
			$dest = $dest . basename($source);
			
			@mkdir($dest);
			@chmod($dest, 0755);
		} else {
			@mkdir($dest, 0755);
			@chmod($dest, 0755);
		}
		$dirHandle = opendir($source);
		while ($file = readdir($dirHandle)) {
			if ($file != "." && $file != "..") {
				if (!is_dir($source . "/" . $file)) {
					$__dest = $dest . "/" . $file;
				} else {
					$__dest = $dest . "/" . $file;
				}
				$result = copy_dir($source . "/" . $file, $__dest,$name);
			}
		}
		closedir($dirHandle);
	} else {
		$result = false;
	}
	return $result;
}






function showHelp() {
	echo  "cli priv/mvc/sql args";
}
if (isset($argv) && is_array($argv) && count($argv) == 3) {
	switch($argv[1]) {
		case  "mvc":
			copy_dir("app/modules/main","app/modules/".$argv[2],$argv[2]);
			break;
		case "priv":
			copy_dir("app/priv/main","app/priv/".$argv[2],$argv[2]);
			break;
		default:
			showHelp();
	}
} else {
	showHelp();
}

