<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>挂号预约</title>
<link href="<?php print AppUrl::getMediaPath()?>/css/style.css" rel="stylesheet" />
</head>



<body>

<div class="ghhead clearfix">

  <div class="wid1000"><a href="<?php print HTTP_ENTRY?>/"><img class="fl" src="<?php print AppUrl::getMediaPath()?>/images/logo2.png" width="267" height="46" /></a>

	<ul class="fr">

	  <li><a href="<?php print HTTP_ENTRY?>/">返回首页</a></li>

	  <li><a href="<?php print AppUrl::getSwtUrl()?>">在线咨询</a></li>

	</ul>

	<div class="clr"></div>

  </div>

</div>
   <script src="<?php print AppUrl::getMediaPath()?>/js/guahao.js"></script>
<div class="ghbanner">

  <div class="ghbannerbox">

	<div class="ghbox">

	  <h2>上海九龙男子医院在线预约平台</h2>

	 <form name="form1" action="http://swt.gssmart.com/guahao/sockt.php" method="post" onSubmit="return guahao()" >

		<table width="490">

		  <tr height="42">

			<td>姓名：

			  <input name="名称" id="name" class="xhline1" /></td>

			<td class="td2">性别：

			  <select>

				<option>男</option>

				<option>女</option>

			  </select></td>

			<td class="td2">年龄：

			  <input name="年龄" id="age" class="xhline1" /></td>

		  </tr>

		</table>

		<table class="table2" width="490">

		  <tr height="42">

			<td>联系电话：

			  <input id="hometel" name="电话" class="xhline2" /></td>

			<td>预约时间：

			  <input  id="yudate" name="预约时间" class="xhline2"  type="text"  onclick="WdatePicker()" /></td>

		  </tr>

		  <tr height="100">

			<td colspan="3">病情描述：

			  <textarea name="病情描述" id="desc" class="xhline3"></textarea></td>

		  </tr>

		  <tr height="75">

			<td colspan="3"><button type="submit">确认提交</button></td>

		  </tr>

		</table>

	  </form>

	  <div class="ghlc tc"><img src="<?php print AppUrl::getMediaPath()?>/images/ghlcpic.jpg" width="313" height="54" /></div>

	</div>

  </div>

</div>

<div class="wid1000">

  <div class="step">

	<div class="sdbt tc"><img src="<?php print AppUrl::getMediaPath()?>/images/sdys.jpg" width="432" height="56" /></div>

	<dl>

	  <dt><img src="<?php print AppUrl::getMediaPath()?>/images/step1.jpg" /></dt>

	  <dd class="dd1"><span>省时</span></dd>

	  <dd class="dd2">缩短看病流程 节约就医时间</dd>

	</dl>

	<dl>

	  <dt><img src="<?php print AppUrl::getMediaPath()?>/images/step2.jpg" /></dt>

	  <dd class="dd1"><span>省心</span></dd>

	  <dd class="dd2">推荐医生解疑 实行专病专治</dd>

	</dl>

	<dl>

	  <dt><img src="<?php print AppUrl::getMediaPath()?>/images/step3.jpg" /></dt>

	  <dd class="dd1"><span>省力</span></dd>

	  <dd class="dd2">无须排队挂号 导医全程服务</dd>

	</dl>

	<dl class="last">

	  <dt><img src="<?php print AppUrl::getMediaPath()?>/images/step4.jpg" /></dt>

	  <dd class="dd1"><span>省钱</span></dd>

	  <dd class="dd2">预约挂医生号 就诊治疗省钱</dd>

	</dl>

	<div class="clr"></div>

  </div>

  <div class="ghfoot">
	<div class="blank30"></div>
  <div class="hr_b"></div>

	<ul class="ghfootnav">

	  <a href="">关于我们</a> <a href="">友情链接</a> <a href="">找大夫咨询</a> <a href="">预约挂号</a> <a href="">版权声明</a> <a class="last" href="">联系我们</a>

	  </li>

	</ul>

	<div class="clr"></div>

	<p class="tc">地址：上海市长宁区中山西路333号（近中山公园）  沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号　网站统计</p>

  </div>

</div>

</body>

</html>