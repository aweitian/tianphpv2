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
<!--

var LiveAutoInvite0='您好，来自%IP%的朋友';
var LiveAutoInvite1='来自首页自动邀请的对话';
var LiveAutoInvite2='<iframe scrolling=no height=245 frameborder=0 width=400 align=center marginwidth=0 src=http://www.long120.com/tc.html charset="utf-8" marginheight=0>';
var LiveAutoInvite2='<P align=center><IMG src=\\"http://www.long120.com/images/kefu4.gif\\" border=0></P>';
var LR_next_invite_seconds = 15;    //10秒后再次显示自动邀请
var LrinviteTimeout = 1;     //8秒后第一次自动弹出
//-->
document.writeln("<script language=\"javascript\" src=\"<?php print AppChannel::getSwt()?>\"></script>");

document.writeln("<style type=\"text/css\">#LRfloater0{display:none;}#LRfloater1{display:none;}</style>");

<?php if(isDoctor($msg)):?>

document.writeln("<div id=\'swtbox\' style=\'width:450px;height:220px; position:fixed;top:50%;left:50%;margin-left:-225px;margin-top:-110px;z-index:999999999;\' >");
document.writeln("<img src=\'/static/pc/swt/<?php print swtbgimg($msg)?>\' border=\'0\' usemap=\'#Map\'/>");
document.writeln("<map name=\'Map\' id=\'Map\'><area shape=\'circle\' coords=\'433,17,12\' onclick=\'closeSwt()\' /><area shape=\'rect\' coords=\'154,161,258,195\' href=\'/subscribe/\' /><area shape=\'rect\' coords=\'3,29,447,216\'  href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\' /></map>");
document.writeln("");
document.writeln("</div>");
document.writeln("");
<?php else:?>

document.writeln("<div id=\'swtbox\' style=\'width:450px;height:220px; position:fixed;top:50%;left:50%;margin-left:-225px;margin-top:-110px;z-index:999999999;\' >");
document.writeln("<img src=\'/static/pc/swt/home.png\' border=\'0\' usemap=\'#Map\'/>");
document.writeln("<map name=\'Map\' id=\'Map\'><area shape=\'circle\' coords=\'433,17,12\' onclick=\'closeSwt()\' /><area shape=\'rect\' coords=\'3,37,448,212\'  href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\' /></map>");
document.writeln("");
document.writeln("</div>");
document.writeln("");
<?php endif?>




function chuxian(){
	document.getElementById('swtbox').style.display='block';

}
function closeSwt(){

	document.getElementById('swtbox').style.display='none';

	setTimeout("chuxian()", 15000);
}