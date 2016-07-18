<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找回密码</title>
<link href="<?php print HTTP_ENTRY?>/static/css/style.css" rel="stylesheet" />
<script src="<?php print HTTP_ENTRY?>/static/js/jquery.js"></script>
<script src="<?php print HTTP_ENTRY?>/static/js/jtClite.js"></script>
<base target="_blank" />
</head>

<body>
<div class="wid1000 loginlogo clearfix"><a href="<?php print AppUrl::navHome()?>"><img class="fl" src="<?php print HTTP_ENTRY?>/static/images/loginlogo.jpg" width="284" height="47" /></a><span class="fl black fz24">找回密码</span></div>
<div class="registerbox">
  <div class="wid1000">
    <div class="rtpboxnr clearfix">
      <div class="rtpboxnrl fl">
        <div class="rtpawdtit">
          <ul class="clearfix fz24 gray">
            <li class="fl selected li1"><b>1</b><br />填写登录名</li>
            <li class="li2 fl"><b>2</b><br />设置新密码</li>
          </ul>
        </div>
        <div class="blank40"></div>
        <div class="rtpform fz13">
          <div class="rtpcon regway selected">
            <form action="" method="post">
              <input class="reginp1 gray border2" value='登录名' onClick='this.value = ""' onblur='if(value == ""){value="登录名"}'   type="text" />
              <div class="blank20"></div>
              <select class="reginp1 gray border2">
              	<option>密码安全问题</option>
                <option>密码安全问题1</option>
              </select>
              <div class="blank20"></div>
              <input class="reginp1 gray  border2" value='安全问题答案' onClick='this.value = ""' onblur='if(value == ""){value="安全问题答案"}' />
              
              <div class="blank30"></div>
              <button class="regsub1" type="submit"><img src="<?php print HTTP_ENTRY?>/static/images/zh_btn.png" width="162" height="40" /></button>
            </form>
          </div>
          <div class="rtpcon regway">
            <form action="" method="post">
              <input class="reginp1 gray border2" value='填写新密码' onClick='this.value = ""' onblur='if(value == ""){value="填写新密码"}'   type="text" />
              <div class="blank20"></div>
              <input class="reginp1 gray  border2" value='确认新密码' onClick='this.value = ""' onblur='if(value == ""){value="确认新密码"}' />
              <div class="blank30"></div>
              <button class="regsub1" type="submit"><img src="<?php print HTTP_ENTRY?>/static/images/zh_btn1.png" width="162" height="40" /></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="blank20"></div>
<div class="blank10"></div>
<div class="loginfooter dgray fz13 wid1000">
  <div class="loginfooternav tc"><a href="">关于我们</a><a href="">友情链接</a><a href="">找大夫咨询</a><a href="">预约挂号</a><a href="">版权声明</a><a class="nobor" href="">联系我们</a></div>
  <div class="blank15"></div>
  <div class="loginfooterloc tc">地址：上海市长宁区中山西路333号（近中山公园）  沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号　网站统计</div>
</div>
</body>
</html>
