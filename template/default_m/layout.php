<?php 
$model = defTplData::getInstance();
$req = new httpRequest();
$curUrl = $req->currentUrl();
//登陆返回URl
$loginReturnUrl = "?return=".urlencode($curUrl);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<title><?php print $model->title?></title>
<?php include dirname(__FILE__)."/public.tpl.php"?>
</head>
<body>
<?php $model->outputContent()?>
<?php include dirname(__FILE__)."/footer.tpl.php"?>

</body>
</html>