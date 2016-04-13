<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 * 		
 */
$HTTP_STATIC = HTTP_ENTRY . ' /static';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title><?php print $title?></title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width"/>
<link rel="stylesheet" href="<?php print $HTTP_STATIC?>/css/style.css"/>
<link rel="stylesheet" href="<?php print $HTTP_STATIC?>/css/my.css"/>
<script type="text/javascript" src="<?php print $HTTP_STATIC?>/js/jquery-2.2.3.min.js"></script>
<link rel="shortcut icon" href="img/favicon.ico"/>
<link rel="apple-touch-icon" href="img/touchicon.png"/>
</head>
<body>
<?php print $content?>
</body>
</html>