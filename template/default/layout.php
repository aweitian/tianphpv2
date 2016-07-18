<?php 
$model = defTplData::getInstance();

$req = new httpRequest();
$curUrl = $req->currentUrl();
//登陆返回URl
$loginReturnUrl = "?return=".urlencode($curUrl);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print $model->title?></title>
<?php include dirname(__FILE__)."/public.tpl.php"?>
</head>

<body>
<div class="header-out">
	<div class="wid1000  header">
		<div class="fl">
			<span>中午好！</span><b>游客</b> , <a href="<?php print AppUrl::userLogin().$loginReturnUrl?>" class="yellow">请登陆</a>
		</div>
		<p class="fr">
			<a href="">设为首页</a>  |  
			<a href="">收藏本站</a>
		</p>
	</div>
</div>
<div class="wid1000">
<?php include dirname(__FILE__)."/header.tpl.php"?>
<?php $model->outputContent()?>
<?php include dirname(__FILE__)."/footer.tpl.php"?>
</div>
</body>
</html>