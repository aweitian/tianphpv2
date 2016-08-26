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
<meta name="keywords" content="<?php print $model->keyword?>" />
<meta name="description" content="<?php print $model->description?>" />


<?php include dirname(__FILE__)."/public.tpl.php"?>
</head>

<body>
	<div class="header-out">
		<div class="wid1000  header">
			<div class="fl">
		<?php if(!AppUser::getInstance()->auth->isLogined()):?>
			<span>
			<?php 
			$date =  getdate(time());
			$hr = $date["hours"];
			if (($hr >= 0) && ($hr <= 7))
				print "已经夜深了，请注意休息哦！";
			elseif (($hr >= 7) && ($hr < 13))
				print "上午好";
			elseif (($hr >= 12) && ($hr <= 19))
				print "下午好 ";
			else
				print "晚上好！";
			?>
			
			
			</span><b>游客</b> , <a <?php print App::useTarget()?>
					href="<?php print AppUrl::userLogin().$loginReturnUrl?>"
					class="yellow">请登陆</a>
		<?php else:?>
		<?php $userinfo = AppUser::getInstance()->auth->getInfo()?>
			<span>中午好！</span> , <a <?php print App::useTarget()?>
					href="<?php print AppUrl::userHome()?>" class="yellow"> <b><?php print AppFilter::filterOut($userinfo["name"]) ?></b>
				</a> &nbsp; <a <?php print App::useTarget()?>
					href="<?php print AppUrl::userLogout()?>">退出</a>	
		<?php endif?>
		</div>
			<p class="fr">
				<a <?php print App::useTarget()?> href="">设为首页</a> | <a
					<?php print App::useTarget()?> href="">收藏本站</a>
			</p>
		</div>
	</div>
	<div class="wid1000">
<?php include dirname(__FILE__)."/header.tpl.php"?>
<?php $model->outputContent()?>
<?php include dirname(__FILE__)."/footer.tpl.php"?>



</body>
</html>