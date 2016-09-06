<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月29日
 * @Desc: 
 * 依赖:
 */
function swtbgimg($msg)
{

	if(isset($msg["?m"]) && $msg["?m"] == 'doctor')
	{
			if(isset($msg["?n"]) && preg_match("/^[a-z]+$/",$msg["?n"]) && file_exists(FILE_SYSTEM_ENTRY.'/web/static/pc/swt/'.$msg["?n"].'.png'))
			{
				return $msg["?n"] . '.png';
			}		
		
	}
	return '';
}
function isDoctor($msg)
{
	if(isset($msg["?m"]) && $msg["?m"] == 'doctor')
		return true;
	else
		return false;
}
?>

document.writeln("<script language=\"javascript\" src=\"<?php print AppChannel::getSwt()?>\"></script>");

document.writeln("<style type=\"text/css\">#LRdiv0{display:none;}#LRfloater0{display:none;}</style>");


document.writeln("<script src=\'/static/m/swt/bouncs.js\'></script>");

<?php if(isDoctor($msg)):?>

document.writeln("<style type=\'text/css\'>");
document.writeln("*{margin:0;padding:0;}");
document.writeln("#swtys{width:292px;height:152px; position:fixed;left:50%;top:50%;margin-left:-146px;margin-top:-72px;z-index:999999999;border:4px #fad699 solid;background:#fff3e0;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;-webkit-box-shadow:0 0 10px #d5d5d5;-moz-box-shadow:0 0 10px #d5d5d5;box-shadow:0 0 10px #d5d5d5;display:none;}");
document.writeln(".swtclose2{ position:absolute;top:-13px;right:-8px;cursor:pointer;}");
document.writeln(".ysbd{border:1px #fff solid;padding:15px 14px;height:120px;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;}");
document.writeln(".ysbd dl{position:relative;}");
document.writeln(".ysbd dt{ position:absolute;top:-23px;left:-5px;}");
document.writeln(".ysbd dd{float:right;width:153px;}");
document.writeln(".ysbd h4{background:url(/static/m/swt/swtbg.png);width:121px;height:23px;font:12px/19px Microsoft Yahei;color:#fff;padding-left:9px;}");
document.writeln(".ysbd h4 span{color:#fff799;}");
document.writeln(".ysbd dd p{color:#333;font:16px/24px Microsoft Yahei;padding-left:9px;}");
document.writeln("ul{ list-style:none;}");
document.writeln(".ysbd li{float:left;padding-top:12px;}");
document.writeln(".ysbd li:last-child{float:right;}");
document.writeln(".animated{-webkit-animation-duration:.8s;animation-duration:.8s;-webkit-animation-fill-mode:both;animation-fill-mode:both;}");
document.writeln("");
document.writeln("@-webkit-keyframes fadeInDown { 0% {");
document.writeln("-webkit-transform:translate3d(0, -300%, 0) ;");
document.writeln("transform: translate3d(0, -300%, 0);");
document.writeln("}");
document.writeln("");
document.writeln("50%{");
document.writeln("-webkit-transform:rotate(3deg);");
document.writeln("transform:rotate(3deg);");
document.writeln("	}");
document.writeln("");
document.writeln("100% {");
document.writeln("-webkit-transform: none;");
document.writeln("transform: none;");
document.writeln("}");
document.writeln("}");
document.writeln("@keyframes fadeInDown { 0% {");
document.writeln("-webkit-transform:translate3d(0, -300%, 0) ;");
document.writeln("transform: translate3d(0, -300%, 0) ;");
document.writeln("}");
document.writeln("50%{");
document.writeln("-webkit-transform:rotate(3deg);");
document.writeln("transform:rotate(3deg);");
document.writeln("	}");
document.writeln("");
document.writeln("100% {");
document.writeln("-webkit-transform: none;");
document.writeln("transform: none;");
document.writeln("}");
document.writeln("}");
document.writeln(".fadeInDown { -webkit-animation-name: fadeInDown; animation-name: fadeInDown }");
document.writeln("@-webkit-keyframes fadeOutDown { ");
document.writeln("50%{");
document.writeln("-webkit-transform:rotate(-5deg);");
document.writeln("transform:rotate(-5deg);");
document.writeln("	}");
document.writeln("100% {");
document.writeln("-webkit-transform:translate3d(0, 300%, 0);");
document.writeln("transform:translate3d(0, 300%, 0);");
document.writeln("}");
document.writeln("}");
document.writeln("@keyframes fadeOutDown { ");
document.writeln("50%{");
document.writeln("");
document.writeln("-webkit-transform:rotate(-5deg);");
document.writeln("transform:rotate(-5deg);");
document.writeln("	}");
document.writeln("100% {");
document.writeln("-webkit-transform:translate3d(0, 300%, 0);");
document.writeln("transform:translate3d(0, 300%, 0) ;");
document.writeln("}");
document.writeln("}");
document.writeln(".fadeOutDown { -webkit-animation-name: fadeOutDown; animation-name: fadeOutDown }");
document.writeln(".bounce{-webkit-animation-name:bounce;animation-name:bounce}");
document.writeln("</style>");

document.writeln("<div id=\'swtys\' class=\'animated fadeInDown\'>");
document.writeln(" <img src=\'/static/m/swt/swtclose.png\' width=\'29\' height=\'29\' class=\'swtclose2\' />");
document.writeln("  <div class=\'ysbd\'>");
document.writeln("    <dl>");
document.writeln("      <dt><img src=\'/static/m/swt/<?php print swtbgimg($msg)?>\' width=\'111\' height=\'105\' /></dt>");
document.writeln("      <dd>");
document.writeln("        <h4>我是今天的<span>值班医生</span></h4>");
document.writeln("        <p>您有任何男科问题，");
document.writeln("可在线与我沟通！</p>");
document.writeln("      </dd>");
document.writeln("    </dl>");
document.writeln("        <ul>");
document.writeln("          <li><a href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\'><img src=\'/static/m/swt/swtbtn3.png\' width=\'126\' height=\'36\' /></a></li>");
document.writeln("          <li><a href=\'tel:<?php print AppChannel::getTel()?>\'><img src=\'/static/m/swt/swtbtn4.png\' width=\'126\' height=\'36\' /></a></li>");
document.writeln("      </ul>");
document.writeln("  </div>");
document.writeln("</div>");
setTimeout(openMswt,3000);

function openMswt(){

	$("#swtys").show().removeClass("fadeInDown").addClass("fadeInDown").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){	
			footerHeight.stop().animate({bottom:-_footerHeight()+'px'},400,function(){
				$(this).show();
				bTrue = true;
			});	
		});		
}

function closeSwt(){
	$("#swtys").removeClass("fadeInDown").addClass("fadeOutDown").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){	
			$(this).removeClass("fadeOutDown").hide();
		});			
}
$(function(){
  $(".swtclose2").on("click",function(){
		closeSwt();
		setTimeout(openMswt,25000);
	})	
})
$(function(){
		var bounce = new Bounce();
		$(".swtclose2").click(function(){
			bounce.rotate({
			  from: 0,
			  to: 360,	
			  duration: 800,		 
		})
       .applyTo(document.querySelectorAll("#yczx"));
      })		
  });

<?php else:?>
document.writeln("<style type=\'text/css\'>");
document.writeln("*{margin:0;padding:0;}");
document.writeln("#swtbox{width:292px;height:134px; position:fixed;left:50%;top:50%;margin-left:-146px;margin-top:-66px;z-index:999999999;border:4px #fad699 solid;background:#fff3e0;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;-webkit-box-shadow:0 0 10px #d5d5d5;-moz-box-shadow:0 0 10px #d5d5d5;box-shadow:0 0 10px #d5d5d5;display:none;}");
document.writeln(".swtbd{border:1px #fff solid;height:112px;padding:10px 13px;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;color:#333;}");
document.writeln(".swtbd h4{font:20px/30px Microsoft Yahei;text-align:center;}");
document.writeln(".swtbd ul{list-style:none;padding-top:10px;}");
document.writeln(".swtbd li{float:left;}");
document.writeln(".swtbd li:last-child{float:right;}");
document.writeln(".swtclose1{ position:absolute;top:-15px;right:-9px;cursor:pointer;}");
document.writeln(".animated{-webkit-animation-duration:.8s;animation-duration:.8s;-webkit-animation-fill-mode:both;animation-fill-mode:both;}");
document.writeln("");
document.writeln("@-webkit-keyframes fadeInDown { 0% {");
document.writeln("-webkit-transform:translate3d(0, -300%, 0) ;");
document.writeln("transform: translate3d(0, -300%, 0);");
document.writeln("}");
document.writeln("");
document.writeln("50%{");
document.writeln("-webkit-transform:rotate(3deg);");
document.writeln("transform:rotate(3deg);");
document.writeln("	}");
document.writeln("");
document.writeln("100% {");
document.writeln("-webkit-transform: none;");
document.writeln("transform: none;");
document.writeln("}");
document.writeln("}");
document.writeln("@keyframes fadeInDown { 0% {");
document.writeln("-webkit-transform:translate3d(0, -300%, 0) ;");
document.writeln("transform: translate3d(0, -300%, 0) ;");
document.writeln("}");
document.writeln("50%{");
document.writeln("-webkit-transform:rotate(3deg);");
document.writeln("transform:rotate(3deg);");
document.writeln("	}");
document.writeln("");
document.writeln("100% {");
document.writeln("-webkit-transform: none;");
document.writeln("transform: none;");
document.writeln("}");
document.writeln("}");
document.writeln(".fadeInDown { -webkit-animation-name: fadeInDown; animation-name: fadeInDown }");
document.writeln("@-webkit-keyframes fadeOutDown { ");
document.writeln("50%{");
document.writeln("-webkit-transform:rotate(-5deg);");
document.writeln("transform:rotate(-5deg);");
document.writeln("	}");
document.writeln("100% {");
document.writeln("-webkit-transform:translate3d(0, 300%, 0);");
document.writeln("transform:translate3d(0, 300%, 0);");
document.writeln("}");
document.writeln("}");
document.writeln("@keyframes fadeOutDown { ");
document.writeln("50%{");
document.writeln("");
document.writeln("-webkit-transform:rotate(-5deg);");
document.writeln("transform:rotate(-5deg);");
document.writeln("	}");
document.writeln("100% {");
document.writeln("-webkit-transform:translate3d(0, 300%, 0);");
document.writeln("transform:translate3d(0, 300%, 0) ;");
document.writeln("}");
document.writeln("}");
document.writeln(".fadeOutDown { -webkit-animation-name: fadeOutDown; animation-name: fadeOutDown }");
document.writeln(".bounce{-webkit-animation-name:bounce;animation-name:bounce}");
document.writeln("</style>");

document.writeln("<div id=\'swtbox\' class=\'animated fadeInDown\'> <img src=\'/static/m/swt/swtclose.png\' width=\'29\' height=\'29\' class=\'swtclose1\' />");
document.writeln("    <div class=\'swtbd\'>");
document.writeln("      <h4>男科疾病在线问诊<br />");
document.writeln("一对一解答护隐私</h4>");
document.writeln("      <ul>");
document.writeln("        <li><a href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\'><img src=\'/static/m/swt/swtbtn1.png\' width=\'126\' height=\'36\' /></a></li>");
document.writeln("        <li><a href=\'tel:<?php print AppChannel::getTel()?>\'><img src=\'/static/m/swt/swtbtn2.png\' width=\'126\' height=\'36\' /></a></li>");
document.writeln("      </ul>");
document.writeln("  </div>");
document.writeln("</div>");



setTimeout(openMswt,3000);

function openMswt(){

	$("#swtbox").show().removeClass("fadeInDown").addClass("fadeInDown").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){	
			footerHeight.stop().animate({bottom:-_footerHeight()+'px'},400,function(){
				$(this).show();
				bTrue = true;
			});	
		});		
}
function closeSwt(){
	$("#swtbox").removeClass("fadeInDown").addClass("fadeOutDown").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){	
			$(this).removeClass("fadeOutDown").hide();
		});		
}
$(function(){
$(".swtclose1").on("click",function(){
		closeSwt();
		setTimeout(openMswt,25000);
	})	
})
$(function(){
		var bounce = new Bounce();
		$(".swtclose1").click(function(){
			bounce.rotate({
			  from: 0,
			  to: 360,	
			  duration: 1200,		 
		})
       .applyTo(document.querySelectorAll("#yczx"));
      })		
  });
<?php endif?>




document.writeln("<div style=\'position:fixed;bottom:2.2rem;right:15px;width:50px;z-index:999999999;animation: animation-11 1000ms linear both;\' id=\'yczx\'><a onclick=\'openZoosUrl();return false;\' href=\'javascript:void(0)\'><img width=\'50\' height=\'55\' src=\'/static/m/images/askdoc.png\'></a></div>");


