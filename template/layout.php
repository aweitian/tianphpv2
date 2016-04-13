<?php
/**
 * Date: Apr 12, 2016
 * Author: Awei.tian
 * Description: 
 */
$HTTP_STATIC = HTTP_ENTRY.'/static';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php print $title?></title>

    <!-- Bootstrap CSS -->    
    <link href="<?php print $HTTP_STATIC?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php print $HTTP_STATIC?>/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php print $HTTP_STATIC?>/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php print $HTTP_STATIC?>/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php print $HTTP_STATIC?>/css/style.css" rel="stylesheet">
    <link href="<?php print $HTTP_STATIC?>/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="<?php print $HTTP_STATIC?>/js/html5shiv.js"></script>
    <script src="<?php print $HTTP_STATIC?>/js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <?php print $content?>


  </body>
</html>

