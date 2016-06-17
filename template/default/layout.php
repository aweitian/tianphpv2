<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print $title?></title>
<?php include dirname(__FILE__)."/public.tpl.php"?>
</head>

<body>
<div class="wid1000">
<?php include dirname(__FILE__)."/header.tpl.php"?>
<?php print $content?>
<?php include dirname(__FILE__)."/footer.tpl.php"?>

</div>
</body>
</html>