<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */
$url = "http://".$_SERVER['HTTP_HOST'].AppUrl::userLogin();
if($url){
	$url ="?redirect=".urlencode($url);
}else{
	$url = "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>手机快速登录/注册</title>
<script language="javascript" src="<?php print AppUrl::getMediaPath()?>/js/base.js"></script>
<script src="<?php print AppUrl::getMediaPath()?>/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script language="javascript" src="<?php print AppUrl::getMediaPath()?>/js/js.js"></script>
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/public_style.css" />
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php print AppUrl::getMediaPath()?>/css/nav_bar.css" />
</head>
<body>
<script>
	function getvc()
	{
		
		$.post(
			'<?php print AppUrl::userRegPhoneSendSms()?>',
					{
						't':$("#phone_no").val(),
						'v':$("#img_vc").val()
						
						
					},
					function(data,status)
					{
						alert(data.info);
						if(data.result==0){
							sendMessage();
							reImg();
							}else{
								reImg();
								}
						
					},
					'json'

				);
	}




	var InterValObj; //timer变量，控制时间
	var count = 60; //间隔函数，1秒执行
	var curCount;//当前剩余秒数

	function sendMessage() {
		
	  　curCount = count;
	　　//设置button效果，开始计时
	     $("#btnSendCode").attr("disabled", "true");
	     $("#btnSendCode").val("请在" + curCount + "秒内输入");
	     InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
	　
	}

	//timer处理函数
	function SetRemainTime() {
	            if (curCount == 0) {                
	                window.clearInterval(InterValObj);//停止计时器
	                $("#btnSendCode").removeAttr("disabled");//启用按钮
	                $("#btnSendCode").val("重新获取");
	            }
	            else {
	                curCount--;
	                $("#btnSendCode").val(+ curCount + "秒内输入");
	            }
	        }

	</script>
<div class="public_width">

<div class="head_tc blue_bg">
    <a class="goback" title="返回上页" onclick="history.go(-1)"><b></b></a>
    <div class="head_tit" >手机快速注册</div>
</div>
<div class="mzy30">
<!--head end-->
<div class="blank30"></div>
<?php print $info?>
<form action="<?php print AppUrl::userRegister()?><?php print $url?>&t=m" method="post">
<div class="login_warp bor_rad borddd">
    <p class="clr">
	<input id='phone_no' name="phone" placeholder='11位中国大陆手机号码' type="text" />
	</p>
    <div class="hd_hsx"></div>
    <p class="clr">
	<input id='img_vc' name="vc" class="login_yzm fl" placeholder='请输入验证码' />
	<img id="Img" src="<?php print AppUrl::Captcha()?>" onclick = "this.src='<?php print AppUrl::Captcha()?>?'+Math.random()" class="login_fsyzm fr"  /> 
	</p>
    <div class="hd_hsx"></div>
     <script type="text/javascript">  
			        function reImg(){  
			            var img = document.getElementById("Img"); 
			         
			            img.src = "/captcha?" + Math.random();  
			          
			        }  
			    </script> 
    <p class="clr">
    	<input name="code" type="text" class="login_yzm fl" placeholder="填写短信验证码" />
        <input id="btnSendCode" type="button" onclick='getvc()' class="login_fsyzm fr bor_rad borblue blue fz24" value="发送验证码" />
    </p>
    <div class="hd_hsx"></div>
    <p class="clr">
	<input name="pwd" type="text"  placeholder='密码' value="" />
	</p>
    <div class="hd_hsx"></div>
    <p class="clr">
	<input name="pwd" type="text"  placeholder="确认密码"  />
	</p>
	<div class="hd_hsx"></div>
	<div class="blank30"></div>
</div>
<div class="blank30"></div>
<button class="login_dl bor_rad" type="submit">注册</button>
</form>
<div class="blank30"></div>
<div class="login_sm1 clr fz26">
	<!--  <a href="<?php print AppUrl::userResetPwd()?>" class="fl blue">忘记密码？</a>-->
    <a href="<?php print AppUrl::userLogin()?>" class="fr blue">帐号密码登录</a>
</div>
</div>
<div class="blank30"></div>
</div>
<div class="backToTop" style="display: block;"></div>
<script src="<?php print AppUrl::getMediaPath()?>/js/touch_new_index.js" type="text/javascript"></script> 
</body>
</html>
