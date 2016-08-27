
<!--
 
var LiveAutoInvite0='您好，来自%IP%的朋友';
var LiveAutoInvite1='来自首页自动邀请的对话';
var LiveAutoInvite2='<iframe scrolling=no height=245 frameborder=0 width=400 align=center marginwidth=0 src=http://www.long120.com/tc.html charset="utf-8" marginheight=0>';
var LiveAutoInvite2='<P align=center><IMG src=\\"http://www.long120.com/images/kefu4.gif\\" border=0></P>';
var LR_next_invite_seconds = 15;    //10秒后再次显示自动邀请
var LrinviteTimeout = 1;     //8秒后第一次自动弹出
//-->
document.writeln("<script language=\"javascript\" src=\"http://kqi.zoossoft.com/JS/LsJS.aspx?siteid=KQI10880110&float=1&lng=cn\"></script>");

document.writeln("<style type=\"text/css\">#LRfloater0{display:none;}#LRfloater1{display:none;}</style>");

document.writeln("<style>");
document.writeln("#swtbox{background:url(/static/pc/swt/swtbg.png) no-repeat;width:450px;height:240px; position:fixed;top:50%;left:50%;margin-left:-225px;margin-top:-120px;z-index:999999999;}");
document.writeln(".swtclose{width:17px;height:17px;position:absolute;top:9px;right:8px;cursor:pointer;}");
document.writeln(".swtan1{width:100px;height:33px;position:absolute;top:136px;left:189px;}");
document.writeln(".swtan2{width:102px;height:33px;position:absolute;top:136px;left:308px;}");
document.writeln("");
document.writeln("</style>");

document.writeln("<div id=\'swtbox\'>");
document.writeln("  <a class=\'swtclose\' onclick=\"closeSwt()\" ></a>");
document.writeln("  <a href=\"javascript:void(0)\" onclick=\"openZoosUrl();return false;\" class=\'swtan1\'></a>");
document.writeln("  <a href=\'/subscribe/\' class=\'swtan2\'></a>");
document.writeln("</div>");


function chuxian(){
	document.getElementById('swtbox').style.display='block';
	
	}
function closeSwt(){

	document.getElementById('swtbox').style.display='none';

	setTimeout("chuxian()", 15000);
	}
