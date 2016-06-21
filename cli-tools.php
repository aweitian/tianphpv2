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
function showHelp() {
	echo  "cli priv/mvc/sql args";
}
if (isset($argv) && is_array($argv) && count($argv) == 3) {
	switch($argv[1]) {
		case "priv":
			genPrivMvc($argv[2]);
			break;
		default:
			showHelp();
	}
} else {
	showHelp();
}

