<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */


?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link href="<?php print AppUrl::getMediaPath()?>/css/style.css" rel="stylesheet" />
<script src="<?php print AppUrl::getMediaPath()?>/js/jquery.js"></script>
<script src="<?php print AppUrl::getMediaPath()?>/js/jtClite.js"></script>
</head>

<body>
<div class="wid1000 loginlogo clearfix"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::navHome()?>"><img class="fl" src="<?php print AppUrl::getMediaPath()?>/images/loginlogo.jpg" width="284" height="47" /></a><span class="fl black fz24">注册帐号</span></div>
<div class="registerbox">
<div class="wid1000"><div class="registerboxnr clearfix">

<div class="registerboxnrl fl">
<div class="registerboxnrltit"><ul class="clearfix fz24 gray"><li class="fl selected li1">普通注册</li><span class="fl"></span><li class="li2 fl">手机注册</li></ul></div>
<div class="blank20"></div>
<div class="registerform fz13">
<div class="registercon regway selected">
<form action="<?php print AppUrl::userRegister()."?t=n"?>" method="post">
<input class="reginp1 gray border2" required placeholder='用户名' name="name" />
<div class="blank20"></div>
<input class="reginp1 gray  border2" required placeholder='密码' name="pwd"/>
<div class="blank20"></div>
<input class="reginp1 gray  border2" required placeholder='确认密码' name="pwd_repeat"/>
<div class="blank20"></div>
<input class="reginp1 gray  border2" required placeholder='密码安全问题,如：我的第一个女朋友的名字' name="sq"/>
<div class="blank20"></div>
<input class="reginp1 gray  border2" required placeholder='密码安全答案,如：JLM' name="sa"/>
<div class="blank20"></div>
<input class="reginp1 gray  border2" placeholder='输入常用邮箱' name="eml"/> (可选)
<div class="blank20"></div>
<div class="regyzm clearfix gray"><input name="code" class="regyzminp fl border2 gray" placeholder='验证码'/><span class="yzmpic fl"><img src="<?php print HTTP_ENTRY?>/captcha" width="86" height="32" id="captcha"/></span><span style="cursor:pointer" onclick="$('#captcha').attr('src','<?php print HTTP_ENTRY?>/captcha?t='+(new Date()).getTime())" class="yzmchange fl">换一张</span></div>
<div class="blank30"></div>
<div class="regxy1 gray"><input type="checkbox" checked/>我已看过并同意 <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="blue">注册协议</a></div>
<div class="blank30"></div>
<button class="regsub1" type="submit"><img src="<?php print AppUrl::getMediaPath()?>/images/regbtn.jpg" width="162" height="40" /></button>
</form></div>
<div class="registercon regway">
<form action="<?php print AppUrl::userRegister()."?t=m"?>" method="post">
<input class="reginp1 gray border2" value='请输入手机号码' onClick='this.value = ""' onblur='if(value == ""){value="请输入手机号码"}'   type="email" />
<div class="blank20"></div>
<div class="regyzm clearfix gray"><input class="regyzminp fl border2 gray" value='验证码' onClick='this.value = ""' onblur='if(value == ""){value="验证码"}' /><div class="getyzm fl tc">点击获取验证码</div></div>
<div class="blank20"></div>
<input class="reginp1 gray  border2" value='密码' onClick='this.value = ""' onblur='if(value == ""){value="密码"}' />
<div class="blank20"></div>
<input class="reginp1 gray  border2" value='确认密码' onClick='this.value = ""' onblur='if(value == ""){value="确认密码"}' />


<div class="blank30"></div>
<div class="regxy1 gray"><input type="checkbox" />我已看过并同意 <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="blue">注册协议</a></div>
<div class="blank30"></div>
<button class="regsub1" type="submit"><img src="<?php print AppUrl::getMediaPath()?>/images/regbtn.jpg" width="162" height="40" /></button>
</form>
</div>
</div>






</div>

<div class="registerboxnrr fr">
<p class="pwz">已有账号,请 <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::userLogin()?>" class="blue">登录</a></p>

</div></div></div>







<div class="blank20"></div>
<div class="blank10"></div>
<div class="loginfooter dgray fz13 wid1000">
  <div class="loginfooternav tc"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="">关于我们</a><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="">友情链接</a><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="">找大夫咨询</a><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="">预约挂号</a><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="">版权声明</a><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="nobor" href="">联系我们</a></div>
  <div class="blank15"></div>
  <div class="loginfooterloc tc">地址：上海市长宁区中山西路333号（近中山公园）  沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号　网站统计</div>
</div>
</body>
</html>
