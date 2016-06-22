<?php
function genPrivMvc($pt){
	$path = 'app/priv/'.$pt;

	if(is_dir($path)){
		//exit('folder ['.$pt.'] exits');
	}
	mkdir($path);
	chmod($path, 0744);
	mkdir($path."/tpl");
	chmod($path."/tpl", 0744);
	$str = file_get_contents('app/modules/tool/tpl/login/loginController.php');
	$c = strtr($str,array(
		"2016-05-09"=>date("Y-m-d",time()),
		"login"=>$pt
	));
	file_put_contents($path.'/'.$pt.'Controller.php', $c);
	chmod($path.'/'.$pt.'Controller.php', 0644);
		
	$str = file_get_contents('app/modules/tool/tpl/login/loginModel.php');
	$c = strtr($str,array(
		"2016-05-09"=>date("Y-m-d",time()),
		"login"=>$pt
	));
	file_put_contents($path.'/'.$pt.'Model.php', $c);
	chmod($path.'/'.$pt.'Model.php', 0644);
		
	$str = file_get_contents('app/modules/tool/tpl/login/loginView.php');
	$c = strtr($str,array(
		"2016-05-09"=>date("Y-m-d",time()),
		"login"=>$pt
	));
	file_put_contents($path.'/'.$pt.'View.php', $c);
	chmod($path.'/'.$pt.'View.php', 0644);
	echo "ok..\n";
}
function genDefMvc($pt){
	$path = 'app/modules/'.$pt;

	if(is_dir($path)){
		//exit('folder ['.$pt.'] exits');
	}
	mkdir($path);
	chmod($path, 0744);
	mkdir($path."/tpl");
	chmod($path."/tpl", 0744);
	$str = file_get_contents('app/modules/tool/tpl/login/loginController.php');
	$c = strtr($str,array(
		"2016-05-09"=>date("Y-m-d",time()),
		"login"=>$pt
	));
	file_put_contents($path.'/'.$pt.'Controller.php', $c);
	chmod($path.'/'.$pt.'Controller.php', 0644);
		
	$str = file_get_contents('app/modules/tool/tpl/login/loginModel.php');
	$c = strtr($str,array(
		"2016-05-09"=>date("Y-m-d",time()),
		"login"=>$pt
	));
	file_put_contents($path.'/'.$pt.'Model.php', $c);
	chmod($path.'/'.$pt.'Model.php', 0644);
		
	$str = file_get_contents('app/modules/tool/tpl/login/loginView.php');
	$c = strtr($str,array(
		"2016-05-09"=>date("Y-m-d",time()),
		"login"=>$pt
	));
	file_put_contents($path.'/'.$pt.'View.php', $c);
	chmod($path.'/'.$pt.'View.php', 0644);
	echo "ok..\n";
}

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
			genPrivMvc($argv[2]);
			break;
		default:
			showHelp();
	}
} else {
	showHelp();
}

