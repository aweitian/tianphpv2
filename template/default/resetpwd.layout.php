<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月15日
 * @Desc: 
 * 依赖:
 */


?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找回密码</title>
<link href="<?php print HTTP_ENTRY?>/static/css/style.css" rel="stylesheet" />
<script src="<?php print HTTP_ENTRY?>/static/js/jquery.js"></script>
<script src="<?php print HTTP_ENTRY?>/static/js/jtClite.js"></script>
</head>

<body>
<div class="wid1000 loginlogo clearfix"><a href="<?php print AppUrl::navHome()?>"><img class="fl" src="<?php print HTTP_ENTRY?>/static/images/loginlogo.jpg" width="284" height="47" /></a><span class="fl black fz24">找回密码</span></div>
<div class="registerbox">
  <div class="wid1000">
    <div class="rtpboxnr clearfix">
      <div class="rtpboxnrl fl">
        <div class="rtpawdtit">
          <ul class="clearfix fz24 gray">
            <li class="fl li1<?php if(isset($_REQUEST["s"]) && $_REQUEST["s"] == "1"):?><?php else:?> selected<?php endif?>"><b>1</b><br />填写登录名</li>
            <li class="li2 fl<?php if(isset($_REQUEST["s"]) && $_REQUEST["s"] == "1"):?> selected<?php else:?><?php endif?>"><b>2</b><br />设置新密码</li>
          </ul>
        </div>
        <div class="blank40"></div>
        <div class="rtpform fz13">
        	<?php print $info;?>
          <div class="rtpcon regway<?php if(isset($_REQUEST["s"]) && $_REQUEST["s"] == "1"):?><?php else:?> selected<?php endif?>">
            <form action="<?php print AppUrl::userResetPwd()?>?s=1" method="post">
              <input class="reginp1 gray border2" name="n" placeholder='登录名' type="text" />
              <div class="blank20"></div>
              <input class="reginp1 gray border2" name="q" placeholder='密码安全问题'>
              <div class="blank20"></div>
              <input class="reginp1 gray border2" name="a" placeholder='密码安全答案' />
              
              <div class="blank30"></div>
              <button class="regsub1" type="submit"><img src="<?php print HTTP_ENTRY?>/static/images/zh_btn.png" width="162" height="40" /></button>
            </form>
          </div>
          <div class="rtpcon regway<?php if(isset($_REQUEST["s"]) && $_REQUEST["s"] == "1"):?> selected<?php else:?><?php endif?>">
            <form action="<?php print AppUrl::userResetPwd()?>?s=2" method="post" onsubmit="return chk(this)">
              <input name="n" value='<?php print isset($_REQUEST["n"]) ? AppFilter::filterOut($_REQUEST["n"]) : ""?>' type="hidden" />
              <input name="q" value='<?php print isset($_REQUEST["q"]) ? AppFilter::filterOut($_REQUEST["q"]) : ""?>' type="hidden" />
              <input name="a" value='<?php print isset($_REQUEST["a"]) ? AppFilter::filterOut($_REQUEST["a"]) : ""?>' type="hidden" />
              <input class="reginp1 gray border2" name="p" placeholder='填写新密码' type="text" />
              <div class="blank20"></div>
              <input class="reginp1 gray border2" name="pp" placeholder='确认新密码' />
              <div class="blank30"></div>
              <button class="regsub1" type="submit"><img src="<?php print HTTP_ENTRY?>/static/images/zh_btn1.png" width="162" height="40" /></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function chk(f)
{
	return f.p.value === f.pp.value && f.p.value !== "" ? true : (alert("两次密码不一样 / 密码为空"),false);	
}
</script>
<div class="blank20"></div>
<div class="blank10"></div>
<div class="loginfooter dgray fz13 wid1000">
  <div class="loginfooternav tc"><a href="">关于我们</a><a href="">友情链接</a><a href="">找大夫咨询</a><a href="">预约挂号</a><a href="">版权声明</a><a class="nobor" href="">联系我们</a></div>
  <div class="blank15"></div>
  <div class="loginfooterloc tc">地址：上海市长宁区中山西路333号（近中山公园）  沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号　网站统计</div>
</div>
</body>
</html>
