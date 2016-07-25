<?php 
$model = defTplData::getInstance();


?>
<!DOCTYPE html>
<html lang="zh-cn" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print $model->title?></title>
<meta name="description" content="<?php print $model->description?>" />
<meta name="keywords" content="<?php print $model->keyword?>" />
<?php include dirname(__FILE__)."/public.tpl.php"?>
</head>

<body>
<div class="wid1000">
<?php include dirname(__FILE__)."/header.tpl.php"?>
<?php $model->outputContent()?>
<?php include dirname(__FILE__)."/footer.tpl.php"?>
</div>
</body>
</html>