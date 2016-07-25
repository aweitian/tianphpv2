document.writeln("");
document.writeln("<style>");
document.writeln(".cent_swt {");
document.writeln("	display: none;");
document.writeln("	width: 745px;");
document.writeln("	height: 578px;");
document.writeln("	background: transparent url(/images/swtbigbg.png)  no-repeat center;");
document.writeln("	position: fixed;");
document.writeln("	left: 50%;");
document.writeln("	top: 54%;");
document.writeln("	margin-left: -388px;");
document.writeln("	margin-top: -314px;");
document.writeln("	color: #FFF;");
document.writeln("	z-index: 9999999999;");
document.writeln("}");
document.writeln(".swt_close {");
document.writeln("	line-height: 23px;");
document.writeln("	width: 160px;");
document.writeln("	height: 30px;");
document.writeln("	position: absolute;");
document.writeln("	right: 10px;");
document.writeln("	top: 5px;");
document.writeln("}");
document.writeln(".swt_close span {");
document.writeln("	float: left;");
document.writeln("	font-size: 16px;");
document.writeln("	color: #FFF;");
document.writeln("	margin-top: 2px;");
document.writeln("}");
document.writeln(".cent_swt_form {");
document.writeln("	width: 623px;");
document.writeln("	margin: 0px auto;");
document.writeln("	padding-top: 167px;");
document.writeln("	font-size: 16px;");
document.writeln("}");
document.writeln(".cent_swt_form div {");
document.writeln("	width: 623px;");
document.writeln("	overflow: hidden;");
document.writeln("	margin-bottom: 18px;");
document.writeln("}");
document.writeln(".cent_swt_form div p {");
document.writeln("	width: 300px;");
document.writeln("	float: left;");
document.writeln("	margin-right: 10px;");
document.writeln("}");
document.writeln(".cent_swt_form p input {");
document.writeln("	width: 190px;");
document.writeln("	float: left;");
document.writeln("	height: 30px;");
document.writeln("	line-height: 30px;");
document.writeln("	border: 0px none;");
document.writeln("	padding-left: 10px;");
document.writeln("	color: #333;");
document.writeln("	font-family: \"新宋体\";");
document.writeln("}");
document.writeln(".cent_swt_form div label {");
document.writeln("	font-size: 16px;");
document.writeln("	font-family: \"微软雅黑\";");
document.writeln("	width: 90px;");
document.writeln("	float: left;");
document.writeln("}");
document.writeln(".cent_swt_form .lynr {");
document.writeln("	width: 490px;");
document.writeln("	float: left;");
document.writeln("	height: 90px;");
document.writeln("	padding: 10px;");
document.writeln("}");
document.writeln(".cent_swt_form .tjan {");
document.writeln("	cursor: pointer;");
document.writeln("	background: #f97229;");
document.writeln("	width: 153px;");
document.writeln("	height: 47px;");
document.writeln("	line-height: 47px;");
document.writeln("	font-size: 18px;");
document.writeln("	color: #fff;");
document.writeln("	border: none;");
document.writeln("	font-family: 微软雅黑;");
document.writeln("	margin-left: 150px;");
document.writeln("	transition: all 0.3s linear 0s;");
document.writeln("}");
document.writeln(".cent_swt_form .tjan:hover {");
document.writeln("	box-shadow: 0px 0px 20px #f97229;");
document.writeln("}");
document.writeln(".cent_swt_form .resetan {");
document.writeln("	cursor: pointer;");
document.writeln("	border: none;");
document.writeln("	width: 153px;");
document.writeln("	height: 47px;");
document.writeln("	line-height: 45px;");
document.writeln("	font-size: 18px;");
document.writeln("	color: #fff;");
document.writeln("	font-family: 微软雅黑;");
document.writeln("	margin-left: 10px;");
document.writeln("	transition: all 0.3s linear 0s;");
document.writeln("	background: #11bcbe;");
document.writeln("}");
document.writeln(".cent_swt_form .resetan:hover {");
document.writeln("	box-shadow: 0px 0px 20px #11bcbe;");
document.writeln("}");
document.writeln(".swt_zs {");
document.writeln("	line-height: 22px;");
document.writeln("	color: #fff;");
document.writeln("	width: 645px;");
document.writeln("	margin: 30px auto 0px;");
document.writeln("}");
document.writeln("</style>");

document.writeln("");
document.writeln("");
document.writeln("<div class=\"cent_swt\">");
document.writeln("  <div class=\"swt_close\"><span>在线预约挂号窗口</span><i id=\"closebtn\"><img src=\"/images/x.png\" width=\"30\" height=\"30\" /></i></div>");
document.writeln("  <form method=\"post\" action=\"http://swt.gssmart.com/guahao/sockt.php\" class=\"cent_swt_form\" id=\"cent_swt_form\" name=\"cent_swt_form\">");
document.writeln("    <div>");
document.writeln("      <p>");
document.writeln("        <label>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>");
document.writeln("        <input type=\'text\' name=\'姓名\' value=\'请输入您的姓名\' onClick=\'this.value = \"\"\' onblur=\'if(value == \"\"){value=\"请输入您的姓名\"}\' />");
document.writeln("      </p>");
document.writeln("      <p>");
document.writeln("        <label>年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：</label>");
document.writeln("        <input type=\'text\' name=\'年龄\' value=\'请输入您的年龄\' onClick=\'this.value = \"\"\' onblur=\'if(value == \"\"){value=\"请输入您的年龄\"}\' />");
document.writeln("      </p>");
document.writeln("    </div>");
document.writeln("    <div>");
document.writeln("      <p>");
document.writeln("        <label>预约号码：</label>");
document.writeln("        <input type=\'text\' name=\'手机号码 \' value=\'请输入您的手机号码 \' onClick=\'this.value = \"\"\' onblur=\'if(value == \"\"){value=\"请输入您的手机号码 \"}\' />");
document.writeln("      </p>");
document.writeln("      <p>");
document.writeln("        <label>就诊时间：</label>");
document.writeln("        <input type=\"date\" name=\"date\" id=\"date\"   />");
document.writeln("      </p>");
document.writeln("    </div>");
document.writeln("    <div>");
document.writeln("      <label>留&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;言：</label>");
document.writeln("      <textarea class=\"lynr\"></textarea>");
document.writeln("    </div>");
document.writeln("    <p>");
document.writeln("      <input class=\"tjan\" type=\"submit\" value=\"确认提交\" />");
document.writeln("      <input class=\"resetan\" type=\"reset\" value=\"重新输入\" />");
document.writeln("    </p>");
document.writeln("  </form>");
document.writeln("  <div class=\"hr_a\"></div>");
document.writeln("  <div class=\"swt_zs\">");
document.writeln("    <p>网上挂号操作说明：</p>");
document.writeln("    <p>1、我院坚决维护个人隐私权，网上填写的所有资料只为您的就诊提供方便。</p>");
document.writeln("    <p>2、本预约系统不收取任何费用，正确填写您的病状与个人信息，就可以直接挂号。</p>");
document.writeln("    <p>3、在您填写预约就诊单并提交后一个工作日内，我们将与您取得联系， 确认预约信息并为您成功挂号。</p>");
document.writeln("  </div>");
document.writeln("</div>");
document.writeln("<div class=\"cent_swt_body\"></div>");


function bookzj(){

		$(".cent_swt").stop().slideDown(800);
		$(".cent_swt_body").stop().css({"height":"100%","width":"100%","background":"#000", "opacity":"0.9","display":"block","position":"fixed","left":"0","top":"0","z-index":"999999999"});
	
}
	
		$(".swt_close").click(function(){
		$(".cent_swt").stop().slideUp(800);
		$(".cent_swt_body").stop().css({"display":"none"});
	});
	
	
	var now = new Date();
	document.cent_swt_form.date.value = [now.getFullYear(), ('00' + (now.getMonth() + 1)).substr(-2), ('00' + now.getDate()).substr(-2)].join('-');
	try {
		document.cent_swt_form.sessionFull.value = sessionStorage.getItem('sessionFull') || '[]';
	} catch (e) {}
	document.cent_swt_form.time.value = now.getFullYear()+"-"+(now.getMonth()+1)+"-"+now.getDate()+" "+now.getHours()+":"+now.getMinutes()+":"+now.getSeconds(); 
