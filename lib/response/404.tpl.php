<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Page not found</title>
<style>
body{
	background-color: #E6E6E6;
	font-family: Helvetica, Arial, sans-serif;
	font-size: 10pt;
	margin: 50px 40px 20px 40px;
}
a{
	font-size:12px;
	text-decoration:none;
	color:#001298;
}
.s404{
	font:bolder 20px/30px arial;
}
</style>
</head>
<body>
<div style="margin: auto;max-width: 540px;min-width: 200px;">
	<div style="background-color: #fbfbfb;border: 1px solid #AAA;border-bottom: 1px solid #888;border-radius: 3px;color: black;box-shadow: 0px 2px 2px #AAA;">
		<div style="margin: 20px;">
			<h1 style="color: #666;margin: 10px 0px 30px 0px;font-weight: normal;font-size: 1.5em;text-align: center;">
				<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABAAgMAAADXB5lNAAAACVBMVEVTU1P///9TU1P8g2f9AAAAAnRSTlMAAHaTzTgAAAB0SURBVHhe1dMxCgMxDAXRIaVOkXrvs/f79ZwyEGNITKwUgcBOZR4upEKcSxeCmSrAFko1r5Cv4J8A6EGzgwLQQAdHD5ljbUFU08Gz8AOwgWX1HlBNC6WyBVWMOBpq5C2pz3ALUIGsP1ZAKtznmxoAAtc5wgegV/QjpyQHeQAAAABJRU5ErkJggg==">
				<br>
				<span class="s404">404</span>
				<br><br>
				<a href="<?php echo ENTRY_HOME;?>">返回到首页</a>
<?php if(isset($_SERVER["HTTP_REFERER"])):?>
 | <a href="<?php echo $_SERVER["HTTP_REFERER"];?>">返回上一页</a>
<?php endif;?>
			</h1>
		</div>
	</div>
</div>
</body>
</html>